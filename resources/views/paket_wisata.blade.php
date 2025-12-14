<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Wisata</title>
    @extends('layouts.main')

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

<section class="max-w-5xl mx-auto mt-10 px-4">
    <h2 class="text-xl font-semibold mb-6 text-gray-800">
        Nikmati Pengalaman Terbaik
    </h2>

    <!-- Card 1 -->
    <div class="border rounded-xl p-6 mb-6 flex items-start justify-between gap-6">
        <img src="wedding.jpg" class="w-60 h-40 object-cover rounded-lg">

        <div class="flex-1">
            <h3 class="text-lg font-semibold text-gray-800">Paket Wedding</h3>
            <div class="flex items-center text-sm text-yellow-400 mt-1">
                ★★★★★ <span class="text-gray-500 ml-2">4.8 (269)</span>
            </div>
            <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                Paket dokumentasi wedding dengan konsep outdoor yang elegan dan natural.
                Cocok untuk mengabadikan momen spesial dengan latar pemandangan indah serta
                sentuhan artistik dari fotografer profesional.
            </p>
        </div>

        <div class="text-right min-w-[140px]">
            <p class="text-gray-400 line-through text-sm">Rp. 1.000.000</p>
            <p class="text-lg font-semibold text-gray-800">Rp. 850.000</p>

            <a href="{{ route('detail_wedding') }}"
               class="inline-block mt-3 border border-gray-400 hover:bg-gray-100 transition px-4 py-2 rounded-lg text-sm">
                Detail Produk
            </a>
        </div>
    </div>

    <div class="border-t mb-6"></div>

    <!-- Card 2 -->
    <div class="border rounded-xl p-6 mb-6 flex items-start justify-between gap-6">
        <img src="private.jpg" class="w-60 h-40 object-cover rounded-lg">

        <div class="flex-1">
            <h3 class="text-lg font-semibold text-gray-800">Paket Private Trip</h3>
            <div class="flex items-center text-sm text-yellow-400 mt-1">
                ★★★★★ <span class="text-gray-500 ml-2">4.8 (269)</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">
                Perjalanan eksklusif yang nyaman, khusus untuk bersama teman atau keluarga.
                Nikmati destinasi tanpa keramaian dengan perjalanan yang dapat disesuaikan sesuai
                kebutuhan Anda.
            </p>
        </div>

        <div class="text-right min-w-[140px]">
            <p class="text-gray-400 line-through text-sm">Rp. 400.000</p>
            <p class="text-lg font-semibold text-gray-800">Rp. 350.000</p>

            <a href="{{ route('detail_private') }}"
               class="inline-block mt-3 border border-gray-400 hover:bg-gray-100 transition px-4 py-2 rounded-lg text-sm">
                Detail Produk
            </a>
        </div>
    </div>

    <div class="border-t mb-6"></div>

    <!-- Card 3 -->
    <div class="border rounded-xl p-6 flex items-start justify-between gap-6">
        <img src="open.jpg" class="w-60 h-40 object-cover rounded-lg">

        <div class="flex-1">
            <h3 class="text-lg font-semibold text-gray-800">Paket Open Trip</h3>
            <div class="flex items-center text-sm text-yellow-400 mt-1">
                ★★★★★ <span class="text-gray-500 ml-2">4.8 (269)</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">
                Trip gabungan yang seru dan ekonomis, cocok bagi Anda yang suka bertemu teman baru.
                Nikmati pengalaman menjelajah destinasi populer bersama teman baru dengan suasana baru
                dan penuh keseruan.
            </p>
        </div>

        <div class="text-right min-w-[140px]">
            <p class="text-gray-400 line-through text-sm">Rp. 350.000</p>
            <p class="text-lg font-semibold text-gray-800">Rp. 250.000</p>

            <a href="{{ route('detail_open') }}"
            class="inline-block mt-3 border border-gray-400 hover:bg-gray-100 transition px-4 py-2 rounded-lg text-sm">
                Detail Produk
            </a>
        </div>
    </div>
</section>

</body>
</html>
