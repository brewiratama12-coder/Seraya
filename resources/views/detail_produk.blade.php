@extends('layouts.main')

@section('title', 'Detail Produk')

@section('content')

<section class="max-w-6xl mx-auto px-6 py-10">

    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 dark:text-gray-400 mb-6">
        <a href="{{ route('main') }}" class="hover:underline">Beranda</a> /
        <a href="{{ route('paket_wisata') }}" class="hover:underline">Paket Wisata</a> /
        <span class="text-gray-700 dark:text-gray-300">Detail Produk</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- LEFT: IMAGE -->
        <div>
            <img src="{{ asset('image/bromo1.jpg') }}"
                 class="w-full h-[430px] object-cover rounded-2xl shadow">
        </div>

        <!-- RIGHT: INFO -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-3">
                Paket Wisata Bromo Sunrise
            </h1>

            <!-- Rating -->
            <div class="flex items-center text-yellow-400 mb-3">
                ⭐⭐⭐⭐⭐
                <span class="text-gray-600 dark:text-gray-300 text-sm ml-2">
                    4.8 • 328 Ulasan
                </span>
            </div>

            <!-- Price -->
            <div class="mb-5">
                <p class="line-through text-gray-400 text-sm">Rp 450.000</p>
                <p class="text-3xl font-bold text-[#213555] dark:text-white">
                    Rp 350.000
                </p>
            </div>

            <!-- Description -->
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                Nikmati keindahan sunrise di Gunung Bromo dengan perjalanan aman,
                nyaman, dan didampingi driver berpengalaman.
                Cocok untuk keluarga, pasangan, maupun solo traveler.
            </p>

            <!-- Facilities -->
            <h3 class="text-lg font-semibold mb-3 text-gray-800 dark:text-white">Fasilitas:</h3>
            <ul class="space-y-2 mb-6 text-gray-600 dark:text-gray-300 text-sm">
                <li>• Jeep Hardtop (Sharing / Private)</li>
                <li>• Tiket Masuk Kawasan Bromo</li>
                <li>• Driver + Guide Lokal</li>
                <li>• Dokumentasi Foto & Video</li>
                <li>• Air Mineral</li>
            </ul>

            <!-- CTA -->
            <div class="flex items-center gap-4 mt-4">
                <a href="{{ route('booking') }}"
                   class="bg-[#213555] text-white px-6 py-3 rounded-xl shadow hover:bg-[#1a2b44] transition">
                    Booking Sekarang
                </a>

                <a href="{{ route('hubungi_kami') }}"
                   class="border border-gray-400 text-gray-800 dark:text-white px-6 py-3 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition">
                    Hubungi Admin
                </a>
            </div>

        </div>

    </div>

    <!-- Detail Description -->
    <div class="mt-14">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
            Deskripsi Lengkap
        </h2>

        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
            Paket Wisata Bromo Sunrise merupakan salah satu paket perjalanan favorit.
            Anda akan dijemput pada dini hari menuju Penanjakan untuk menikmati sunrise
            terbaik di Indonesia. Setelah itu perjalanan menuju Kawah Bromo,
            Lautan Pasir, dan Bukit Teletubbies.
        </p>

        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
            Trip ini sangat cocok bagi Anda yang ingin menikmati keindahan alam
            dengan pelayanan profesional dan aman. Kami menyediakan fasilitas terbaik
            untuk menjamin kenyamanan perjalanan Anda.
        </p>
    </div>

</section>

@endsection
