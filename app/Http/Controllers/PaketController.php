<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\PaketWisata;

class PaketController extends Controller
{
    private function ensureDefaultPaket(?string $jenis, string $nama, float $harga, string $deskripsi): void
    {
        if (!Schema::hasTable('paket_wisata')) {
            return;
        }
        $exists = false;
        if (Schema::hasColumn('paket_wisata', 'jenis_paket')) {
            $exists = DB::table('paket_wisata')->where('jenis_paket', $jenis)->exists();
        } else {
            if (Schema::hasColumn('paket_wisata', 'nama_paket')) {
                $exists = DB::table('paket_wisata')->where('nama_paket', $nama)->exists();
            }
        }
        if ($exists) {
            return;
        }
        $data = [
            'created_at' => now(),
            'updated_at' => now(),
        ];
        if (Schema::hasColumn('paket_wisata', 'nama_paket')) {
            $data['nama_paket'] = $nama;
        }
        if (Schema::hasColumn('paket_wisata', 'deskripsi')) {
            $data['deskripsi'] = $deskripsi;
        }
        if (Schema::hasColumn('paket_wisata', 'harga')) {
            $data['harga'] = $harga;
        }
        if (Schema::hasColumn('paket_wisata', 'harga_asli')) {
            $defaultsAsli = [
                'open' => 350000,
                'private' => 400000,
                'wedding' => 1000000,
            ];
            $data['harga_asli'] = $defaultsAsli[$jenis ?? 'open'] ?? $harga;
        }
        if (Schema::hasColumn('paket_wisata', 'jenis_paket')) {
            $data['jenis_paket'] = $jenis;
        }
        if (Schema::hasColumn('paket_wisata', 'status')) {
            $data['status'] = 'tersedia';
        }
        DB::table('paket_wisata')->insert($data);
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $this->ensureDefaultPaket('open', 'Paket Open Trip', 350000, 'Trip gabungan yang seru dan ekonomis, cocok bagi Anda yang suka bertemu teman baru. Nikmati pengalaman menjelajah destinasi populer bersama teman baru dengan suasana baru dan penuh keseruan.');
        $this->ensureDefaultPaket('private', 'Paket Private Trip', 750000, 'Perjalanan eksklusif yang nyaman, khusus untuk bersama teman atau keluarga. Nikmati destinasi tanpa keramaian dengan perjalanan yang dapat disesuaikan sesuai kebutuhan Anda.');
        $this->ensureDefaultPaket('wedding', 'Paket Wedding', 850000, 'Paket dokumentasi wedding dengan konsep outdoor yang elegan dan natural. Cocok untuk mengabadikan momen spesial dengan latar pemandangan indah serta sentuhan artistik dari fotografer profesional.');

        if (Schema::hasTable('paket_wisata')) {
            $defaults = [
                ['jenis' => 'open', 'nama' => 'Paket Open Trip', 'deskripsi' => 'Trip gabungan yang seru dan ekonomis, cocok bagi Anda yang suka bertemu teman baru. Nikmati pengalaman menjelajah destinasi populer bersama teman baru dengan suasana baru dan penuh keseruan.'],
                ['jenis' => 'private', 'nama' => 'Paket Private Trip', 'deskripsi' => 'Perjalanan eksklusif yang nyaman, khusus untuk bersama teman atau keluarga. Nikmati destinasi tanpa keramaian dengan perjalanan yang dapat disesuaikan sesuai kebutuhan Anda.'],
                ['jenis' => 'wedding', 'nama' => 'Paket Wedding', 'deskripsi' => 'Paket dokumentasi wedding dengan konsep outdoor yang elegan dan natural. Cocok untuk mengabadikan momen spesial dengan latar pemandangan indah serta sentuhan artistik dari fotografer profesional.'],
            ];
            foreach ($defaults as $d) {
                $query = DB::table('paket_wisata');
                if (Schema::hasColumn('paket_wisata', 'jenis_paket')) {
                    $query->where('jenis_paket', $d['jenis']);
                } elseif (Schema::hasColumn('paket_wisata', 'nama_paket')) {
                    $query->where('nama_paket', $d['nama']);
                }
                $row = $query->first();
                if ($row && Schema::hasColumn('paket_wisata', 'deskripsi')) {
                    $desc = $row->deskripsi ?? '';
                    if ($desc === '' || str_contains($desc, 'default') || str_contains($desc, 'otomatis')) {
                        DB::table('paket_wisata')->where('id', $row->id)->update([
                            'deskripsi' => $d['deskripsi'],
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }

        $query = PaketWisata::query();
        if ($q) {
            $query->where('nama_paket', 'like', "%{$q}%")
                  ->orWhere('deskripsi', 'like', "%{$q}%");
        }

        $pakets = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.paket_index', compact('pakets', 'q'));
    }

    public function publicIndex(Request $request)
    {
        $query = PaketWisata::query();
        if (Schema::hasColumn('paket_wisata', 'status')) {
            $query->where('status', 'tersedia');
        }
        $pakets = $query->orderBy('id', 'desc')->get();
        return view('paket_wisata', compact('pakets'));
    }

    public function edit($id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('admin.paket_edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketWisata::findOrFail($id);
        $data = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'harga_asli' => 'nullable|numeric|min:0',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'gambar' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('paket', 'public');
            // delete old image if exists
            if ($paket->gambar) {
                Storage::disk('public')->delete($paket->gambar);
            }
            $data['gambar'] = $path;
        }

        if (!Schema::hasColumn('paket_wisata', 'harga_asli')) {
            unset($data['harga_asli']);
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }
}
