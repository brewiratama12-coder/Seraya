@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total Produk -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">Total Produk</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalProduk }}</p>
        </div>

        <!-- Total Pesanan -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">Total Pesanan</h2>
            <p class="text-3xl font-bold mt-2">{{ $totalBooking }}</p>
        </div>

        <!-- Pembayaran Menunggu Verifikasi -->
        <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow">
            <h2 class="text-lg font-semibold">Menunggu Verifikasi</h2>
            <p class="text-3xl font-bold mt-2">{{ $menungguVerifikasi }}</p>
        </div>

    </div>

</div>
@endsection
