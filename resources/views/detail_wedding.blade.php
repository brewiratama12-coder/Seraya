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
                Paket Wedding Bromo
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
                <p class="line-through text-gray-400 text-sm">Rp 1.000.000</p>
                <p class="text-3xl font-bold text-[#213555] dark:text-white">
                    Rp 850.000
                </p>
            </div>

            <!-- Description -->
            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                Wujudkan momen pernikahan impian dengan konsep romantis di destinasi istimewa, ditangani oleh tim profesional dengan dekorasi, dokumentasi, dan pelayanan lengkap untuk hari yang tak terlupakan.
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
                <a href="{{ route('pembayaran_wedding') }}"
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
Paket Wedding / Prewedding Trip merupakan paket spesial untuk pasangan yang ingin mengabadikan momen cinta di lokasi-lokasi indah dan romantis. Kami akan mengantar Anda ke destinasi terbaik yang terkenal dengan panorama alam yang menakjubkan sebagai latar belakang foto dan video pernikahan impian Anda.
        </p>

        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
            Selama proses pengambilan foto, tim profesional kami siap membantu dari pengaturan perjalanan, koordinasi lokasi, hingga penyediaan fasilitas pendukung. Paket ini sangat cocok bagi Anda yang ingin mendapatkan hasil foto yang elegan, alami, dan penuh cerita tanpa harus repot mengurus detail teknis perjalanan. Kami memastikan setiap momen berharga Anda terekam dengan sempurna dalam suasana yang aman dan nyaman.
        </p>
    </div>

</section>

@endsection
