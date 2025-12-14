<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard');
    }

    /**
     * Show the pesanan page (orders table)
     */
    public function pesanan(): View
    {
        $user = auth()->user();

        $totalProduk = Schema::hasTable('paket_wisata') ? DB::table('paket_wisata')->count() : 0;
        $totalBooking = Schema::hasTable('permintaan') ? DB::table('permintaan')->count() : 0;

        $menungguVerifikasi = 0;
        if (Schema::hasTable('pembayaran')) {
            $menungguVerifikasi = DB::table('pembayaran')->where('status_pembayaran', 'pending')->count();
        }

        $totalPendapatan = 0;
        if (Schema::hasTable('pembayaran')) {
            $totalPendapatan = (float) DB::table('pembayaran')
                ->where('status_pembayaran', 'lunas')
                ->sum('total_harga');
        }

        $pendingCount = 0;
        $dispatchCount = 0;
        $selesaiCount = 0;
        if (Schema::hasTable('permintaan') && Schema::hasColumn('permintaan', 'status')) {
            $pendingCount = DB::table('permintaan')->where('status', 'pending')->count();
            $dispatchCount = DB::table('permintaan')->where('status', 'dispatch')->count();
            $selesaiCount = DB::table('permintaan')->where('status', 'selesai')->count();
        }

        $tab = request()->query('tab', 'all');
        if (Schema::hasTable('permintaan')) {
            $ordersQuery = DB::table('permintaan');
            if (Schema::hasTable('users')) {
                $ordersQuery->leftJoin('users', 'permintaan.user_id', '=', 'users.id');
            }
            if (Schema::hasTable('paket_wisata')) {
                $ordersQuery->leftJoin('paket_wisata', 'permintaan.paket_id', '=', 'paket_wisata.id');
            }
            $selects = ['permintaan.*'];
            if (Schema::hasTable('users')) {
                if (Schema::hasColumn('users', 'name')) {
                    $selects[] = 'users.name as user_name';
                } elseif (Schema::hasColumn('users', 'nama_lengkap')) {
                    $selects[] = 'users.nama_lengkap as user_name';
                } elseif (Schema::hasColumn('users', 'username')) {
                    $selects[] = 'users.username as user_name';
                } elseif (Schema::hasColumn('users', 'email')) {
                    $selects[] = 'users.email as user_name';
                }
            }
            if (Schema::hasTable('paket_wisata')) {
                if (Schema::hasColumn('paket_wisata', 'nama_paket')) {
                    $selects[] = 'paket_wisata.nama_paket';
                } elseif (Schema::hasColumn('paket_wisata', 'nama')) {
                    $selects[] = 'paket_wisata.nama as nama_paket';
                }
            }
            $ordersQuery->select($selects);
        } else {
            $ordersQuery = collect();
        }

        if ($tab !== 'all' && Schema::hasTable('permintaan') && Schema::hasColumn('permintaan', 'status')) {
            $ordersQuery->where('permintaan.status', $tab);
        }

        $orders = Schema::hasTable('permintaan') ? $ordersQuery->orderBy('permintaan.id', 'desc')->paginate(10) : collect();

        return view('admin.pesanan', [
            'user' => $user,
            'totalProduk' => $totalProduk,
            'totalBooking' => $totalBooking,
            'menungguVerifikasi' => $menungguVerifikasi,
            'totalPendapatan' => $totalPendapatan,
            'pendingCount' => $pendingCount,
            'dispatchCount' => $dispatchCount,
            'selesaiCount' => $selesaiCount,
            'orders' => $orders,
            'activeTab' => $tab,
        ]);
    }

    public function pembayaran(): View
    {
        $payments = collect();
        if (Schema::hasTable('pembayaran')) {
            $query = DB::table('pembayaran')
                ->leftJoin('users', 'pembayaran.user_id', '=', 'users.id')
                ->leftJoin('permintaan', 'pembayaran.permintaan_id', '=', 'permintaan.id')
                ->leftJoin('paket_wisata', 'permintaan.paket_id', '=', 'paket_wisata.id')
                ->select(
                    'pembayaran.id',
                    'pembayaran.total_harga',
                    'pembayaran.status_pembayaran',
                    'pembayaran.bukti',
                    'users.name as user_name',
                    'paket_wisata.nama_paket'
                )
                ->where('pembayaran.status_pembayaran', 'pending')
                ->orderBy('pembayaran.id', 'desc');
            $payments = $query->paginate(10);
        }

        return view('payments', [
            'payments' => $payments,
        ]);
    }

    public function verifyPembayaran(int $id)
    {
        if (Schema::hasTable('pembayaran')) {
            DB::table('pembayaran')
                ->where('id', $id)
                ->update([
                    'status_pembayaran' => 'lunas',
                    'tanggal' => Carbon::now()->toDateString(),
                    'updated_at' => Carbon::now(),
                ]);
        }

        return redirect()->route('admin.pembayaran.index')->with('status', 'Pembayaran diverifikasi.');
    }

    public function rejectPembayaran(int $id)
    {
        if (Schema::hasTable('pembayaran')) {
            DB::table('pembayaran')
                ->where('id', $id)
                ->update([
                    'status_pembayaran' => 'gagal',
                    'updated_at' => Carbon::now(),
                ]);
        }

        return redirect()->route('admin.pembayaran.index')->with('status', 'Pembayaran ditolak.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
