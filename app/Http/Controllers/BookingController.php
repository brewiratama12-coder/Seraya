<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class BookingController extends Controller
{
    private function getOrCreatePaketId(?string $paketJenis): ?int
    {
        if (!Schema::hasTable('paket_wisata')) {
            return null;
        }
        $paketId = null;
        if ($paketJenis && Schema::hasColumn('paket_wisata', 'jenis_paket')) {
            $query = DB::table('paket_wisata')->where('jenis_paket', $paketJenis);
            if (Schema::hasColumn('paket_wisata', 'status')) {
                $query->where('status', 'tersedia');
            }
            $paketId = $query->value('id');
        }
        if (!$paketId) {
            $paketId = DB::table('paket_wisata')->value('id');
        }
        if (!$paketId) {
            $data = [];
            if (Schema::hasColumn('paket_wisata', 'nama_paket')) {
                $data['nama_paket'] = $paketJenis ? ('Paket ' . ucfirst($paketJenis)) : 'Paket Default';
            }
            if (Schema::hasColumn('paket_wisata', 'deskripsi')) {
                $data['deskripsi'] = 'Paket otomatis dibuat sebagai fallback.';
            }
            if (Schema::hasColumn('paket_wisata', 'harga')) {
                $data['harga'] = 350000;
            }
            if (Schema::hasColumn('paket_wisata', 'jenis_paket')) {
                $data['jenis_paket'] = $paketJenis ?: 'open';
            }
            if (Schema::hasColumn('paket_wisata', 'status')) {
                $data['status'] = 'tersedia';
            }
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            $paketId = DB::table('paket_wisata')->insertGetId($data);
        }
        return $paketId ?: null;
    }
    /**
     * Handle proof upload from the booking/payment page.
     */
    public function uploadProof(Request $request): JsonResponse
    {
        $request->validate([
            'proof' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:5120',
            'jumlahOrang' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ], [
            'proof.max' => 'Ukuran file maksimal 5MB.',
        ]);

        $file = $request->file('proof');
        $user = Auth::user();

        // store under public/uploads/bukti to match existing views
        $uploadDir = public_path('uploads/bukti');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());
        $file->move($uploadDir, $filename);

        $paketJenis = $request->input('paket_jenis');
        $paketId = $request->input('paket_id') ?: $this->getOrCreatePaketId($paketJenis);

        $jumlah = (int) $request->input('jumlahOrang', 1);
        $catatan = $request->input('catatan');
        $tanggal = $request->input('tanggal');

        $jadwalId = null;
        if (Schema::hasTable('jadwal_keberangkatan') && $paketId) {
            $jadwalId = DB::table('jadwal_keberangkatan')
                ->where('paket_id', $paketId)
                ->where('tanggal_keberangkatan', $tanggal)
                ->value('id');
            if (!$jadwalId) {
                $insertJadwal = [
                    'paket_id' => $paketId,
                    'tanggal_keberangkatan' => $tanggal,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                if (Schema::hasColumn('jadwal_keberangkatan', 'jam_keberangkatan')) {
                    $insertJadwal['jam_keberangkatan'] = null;
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'kuota')) {
                    $insertJadwal['kuota'] = null;
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'peserta_terdaftar')) {
                    $insertJadwal['peserta_terdaftar'] = 0;
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'status')) {
                    $insertJadwal['status'] = 'tersedia';
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'catatan')) {
                    $insertJadwal['catatan'] = null;
                }
                $jadwalId = DB::table('jadwal_keberangkatan')->insertGetId($insertJadwal);
            }
        }

        $permintaanId = null;
        if (Schema::hasTable('permintaan')) {
            $permintaanData = [
                'user_id' => $user->id,
                'paket_id' => $paketId,
                'peserta' => $jumlah,
                'tgl_permintaan' => Carbon::now()->toDateString(),
                'catatan' => $catatan,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            if (Schema::hasColumn('permintaan', 'jadwal_keberangkatan_id')) {
                $permintaanData['jadwal_keberangkatan_id'] = $jadwalId;
            }
            if (Schema::hasColumn('permintaan', 'tanggal_berangkat')) {
                $permintaanData['tanggal_berangkat'] = $tanggal;
            }
            if (Schema::hasColumn('permintaan', 'tanggal_kepulangan')) {
                $permintaanData['tanggal_kepulangan'] = $tanggal;
            }
            if (Schema::hasColumn('permintaan', 'status')) {
                $permintaanData['status'] = 'pending';
            }
            $permintaanId = DB::table('permintaan')->insertGetId($permintaanData);
        }

        // compute total_harga from paket if available
        $totalHarga = 0;
        if ($paketId && Schema::hasTable('paket_wisata')) {
            $harga = Schema::hasColumn('paket_wisata', 'harga')
                ? DB::table('paket_wisata')->where('id', $paketId)->value('harga')
                : 0;
            $totalHarga = $harga ? (float)$harga * $jumlah : 0;
        }

        // create pembayaran record
        if (Schema::hasTable('pembayaran')) {
            DB::table('pembayaran')->insert([
                'permintaan_id' => $permintaanId,
                'user_id' => $user->id,
                'total_harga' => $totalHarga,
                'status_pembayaran' => 'pending',
                'nomor_rekening' => null,
                'tanggal' => $tanggal,
                'bukti' => $filename,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Bukti berhasil diunggah dan pesanan dibuat.',
            'redirect' => route('booking'),
            'file' => '/uploads/bukti/' . $filename,
        ]);
    }

    /**
     * Handle "Saya Sudah Bayar" confirmation without proof.
     * Creates permintaan and pembayaran (status pending).
     */
    public function confirmPayment(Request $request): JsonResponse
    {
        $request->validate([
            'jumlahOrang' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $user = Auth::user();
        $file = $request->file('proof');
        $filename = null;

        if ($file) {
            $uploadDir = public_path('uploads/bukti');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move($uploadDir, $filename);
        }

        $paketJenis = $request->input('paket_jenis');
        $paketId = $request->input('paket_id') ?: $this->getOrCreatePaketId($paketJenis);
        $jumlah = (int) $request->input('jumlahOrang', 1);
        $catatan = $request->input('catatan');
        $tanggal = $request->input('tanggal');

        $jadwalId = null;
        if (Schema::hasTable('jadwal_keberangkatan') && $paketId) {
            $jadwalId = DB::table('jadwal_keberangkatan')
                ->where('paket_id', $paketId)
                ->where('tanggal_keberangkatan', $tanggal)
                ->value('id');
            if (!$jadwalId) {
                $insertJadwal = [
                    'paket_id' => $paketId,
                    'tanggal_keberangkatan' => $tanggal,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                if (Schema::hasColumn('jadwal_keberangkatan', 'jam_keberangkatan')) {
                    $insertJadwal['jam_keberangkatan'] = null;
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'kuota')) {
                    $insertJadwal['kuota'] = null;
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'peserta_terdaftar')) {
                    $insertJadwal['peserta_terdaftar'] = 0;
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'status')) {
                    $insertJadwal['status'] = 'tersedia';
                }
                if (Schema::hasColumn('jadwal_keberangkatan', 'catatan')) {
                    $insertJadwal['catatan'] = null;
                }
                $jadwalId = DB::table('jadwal_keberangkatan')->insertGetId($insertJadwal);
            }
        }

        $permintaanId = null;
        if (Schema::hasTable('permintaan')) {
            $permintaanData = [
                'user_id' => $user->id,
                'paket_id' => $paketId,
                'peserta' => $jumlah,
                'tgl_permintaan' => Carbon::now()->toDateString(),
                'catatan' => $catatan,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            if (Schema::hasColumn('permintaan', 'jadwal_keberangkatan_id')) {
                $permintaanData['jadwal_keberangkatan_id'] = $jadwalId;
            }
            if (Schema::hasColumn('permintaan', 'tanggal_berangkat')) {
                $permintaanData['tanggal_berangkat'] = $tanggal;
            }
            if (Schema::hasColumn('permintaan', 'tanggal_kepulangan')) {
                $permintaanData['tanggal_kepulangan'] = $tanggal;
            }
            if (Schema::hasColumn('permintaan', 'status')) {
                $permintaanData['status'] = 'pending';
            }
            $permintaanId = DB::table('permintaan')->insertGetId($permintaanData);
        }

        $totalHarga = 0;
        if ($paketId && Schema::hasTable('paket_wisata')) {
            $harga = Schema::hasColumn('paket_wisata', 'harga')
                ? DB::table('paket_wisata')->where('id', $paketId)->value('harga')
                : 0;
            $totalHarga = $harga ? (float)$harga * $jumlah : 0;
        }

        if (Schema::hasTable('pembayaran')) {
            DB::table('pembayaran')->insert([
                'permintaan_id' => $permintaanId,
                'user_id' => $user->id,
                'total_harga' => $totalHarga,
                'status_pembayaran' => 'pending',
                'nomor_rekening' => null,
                'tanggal' => $tanggal,
                'bukti' => $filename,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat. Silakan unggah bukti jika diperlukan.',
        ]);
    }
}
