@extends('layouts.main')
@section('title', 'Paket Wisata')
@section('content')
<section class="max-w-5xl mx-auto mt-10 px-4">
    <h2 class="text-xl font-semibold mb-6 text-gray-800 dark:text-white">
        Nikmati Pengalaman Terbaik
    </h2>
    @foreach($pakets as $p)
    @php
        $img = $p->gambar ? asset('storage/'.$p->gambar) : (
            ($p->jenis_paket ?? '') === 'wedding' ? 'wedding.jpg' :
            (($p->jenis_paket ?? '') === 'private' ? 'private.jpg' : 'open.jpg')
        );
        $detailRoute = ($p->jenis_paket ?? '') === 'wedding' ? route('detail_wedding')
                      : (($p->jenis_paket ?? '') === 'private' ? route('detail_private')
                      : route('detail_open'));
    @endphp
    <div class="border rounded-xl p-6 mb-6 flex items-start justify-between gap-6 dark:border-slate-700 dark:bg-[#1e293b] hover:bg-gray-50 dark:hover:bg-[#334155] transition cursor-pointer" onclick="window.location='{{ $detailRoute }}'">
        <img src="{{ $img }}" class="w-60 h-40 object-cover rounded-lg">
        <div class="flex-1">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $p->nama_paket }}</h3>
            <div class="flex items-center text-sm text-yellow-400 mt-1">
                ★★★★★ <span class="text-gray-500 dark:text-gray-300 ml-2">4.8 (269)</span>
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-200 mt-2 leading-relaxed">
                {{ $p->deskripsi }}
            </p>
        </div>
        <div class="text-right min-w-[140px]">
            @php
                $harga = $p->harga ?? 0;
                $hargaAsli = $p->harga_asli ?? null;
            @endphp
            @if($hargaAsli && $hargaAsli > $harga)
                <p class="text-gray-400 dark:text-gray-300 line-through text-sm">Rp. {{ number_format($hargaAsli, 0, ',', '.') }}</p>
            @endif
            <p class="text-lg font-semibold text-gray-800 dark:text-white">Rp. {{ number_format($harga, 0, ',', '.') }}</p>
            <a href="{{ $detailRoute }}"
               class="inline-block mt-3 border border-gray-400 dark:border-slate-600 hover:bg-gray-100 dark:hover:bg-[#334155] transition px-4 py-2 rounded-lg text-sm text-gray-800 dark:text-white">
                Detail Produk
            </a>
        </div>
    </div>
    @endforeach
</section>
@endsection
