@extends('layouts.main')

@section('title', 'Welcome')

@section('content')

{{-- HERO SECTION --}}
<section class="w-full bg-white dark:bg-[#0f172a] pb-2 transition-colors duration-500">
    <div class="w-full px-0">
        <div class="grid grid-cols-7 lg:grid-cols-3 rounded-2xl overflow-hidden shadow-lg">
            
            {{-- Left --}}
            <div class="relative lg:col-span-2 group">
                <img src="/image/bromo2.jpg" 
                     class="w-full h-[520px] object-cover transition duration-500 group-hover:scale-105">
                <div class="absolute top-6 left-6 text-white max-w-sm drop-shadow-lg">
                    <h2 class="text-xl font-bold mb-2">Travel</h2>
                    <p class="text-sm leading-relaxed">
                        Seraya Travel adalah penyedia layanan perjalanan yang berfokus untuk memberikan pengalaman
                        liburan yang aman, nyaman, dan berkesan. Kami membantu pelanggan menemukan destinasi impian.
                    </p>
                </div>
            </div>

            {{-- Right --}}
            <div class="flex flex-col">
                <div class="relative h-[260px] group">
                    <img src="/image/bromo3.0.jpg"
                         class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute top-6 left-6 text-white drop-shadow-lg">
                        <h2 class="text-xl font-bold mb-1">Inspirasi Perjalanan</h2>
                        <p class="text-sm max-w-xs leading-relaxed">
                            Setiap perjalanan adalah cerita baru yang berharga.
                        </p>
                    </div>
                </div>

                <div class="relative h-[260px] group">
                    <img src="/image/bromo1.jpg"
                         class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                    <div class="absolute top-6 left-6 text-white drop-shadow-lg">
                        <h2 class="text-xl font-bold mb-1">Nilai Kami</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



{{-- TENTANG TRAVEL --}}
<section class="bg-[#2f4f72] rounded-2xl p-10 md:p-16 mt-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        {{-- Left --}}
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-white">Tentang Travel Kami</h2>
            <p class="text-white mt-4 leading-relaxed">
                Semua Travel memberikan pengalaman liburan yang aman, nyaman, dan berkesan. 
                Kami siap membantu perjalanan wisata, ziarah, keluarga, hingga bisnis.
            </p>
        </div>

        {{-- Right Card --}}
        <div class="relative flex justify-center md:justify-end">
            <div class="bg-white rounded-2xl p-8 w-[330px] shadow-xl relative">

                <img src="{{ asset('image/bromo1.jpg') }}"
                     class="w-24 h-24 rounded-full object-cover border-4 border-white
                     absolute left-1/2 -translate-x-1/2 -top-12 shadow-lg">

                <h3 class="text-center mt-16 text-lg italic text-gray-700">Jiddan</h3>
                <p class="text-center mt-4 text-gray-700 leading-relaxed">
                    Pendiri kami percaya bahwa setiap perjalanan adalah cerita berharga.
                </p>
            </div>
        </div>

    </div>
</section>



{{-- ALASAN MEMILIH KAMI --}}
<section class="px-6 md:px-20 py-16 bg-white dark:bg-[#0f172a] transition-colors">

    <h2 class="text-2xl md:text-3xl font-bold mb-12 text-[#0f172a] dark:text-white">
        Alasan Memilih Kami
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Item --}}
        @foreach ([
            ['flex.svg', 'fleksibilitas tinggi', 'Kebebasan menjadwalkan perjalanan & berbagai metode pembayaran.'],
            ['travel.svg', 'pengalaman tak terlupakan', 'Destinasi dan aktivitas menarik untuk pengalaman terbaik.'],
            ['quality.svg', 'kualitas terbaik', 'Pelayanan terbaik demi kenyamanan pelanggan.'],
            ['service.svg', 'layanan pelanggan terbaik', 'Tim kami siap mendampingi kapan pun dibutuhkan.']
        ] as $item)

        <div class="text-center md:text-left">
            <img src="/icons/{{ $item[0] }}" class="w-10 mx-auto md:mx-0">
            <h3 class="font-bold text-lg mt-3 dark:text-white">{{ $item[1] }}</h3>
            <p class="text-sm mt-2 leading-relaxed text-gray-600 dark:text-gray-300">
                {{ $item[2] }}
            </p>
        </div>

        @endforeach

    </div>
</section>



{{-- PILIHAN PAKET --}}
<section class="px-6 md:px-20 py-10 bg-white dark:bg-[#0f172a] transition-colors">

    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl md:text-2xl font-bold dark:text-white">Pilihan Paket</h2>
        <a href="#" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-300">See all</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        @foreach ([
            ['paket1.jpg', 'Paket Open Trip'],
            ['paket2.jpg', 'Paket Private Trip'],
            ['paket3.jpg', 'Paket Wedding']
        ] as $p)

        <div class="border dark:border-gray-700 rounded-xl p-4 hover:shadow-lg dark:hover:shadow-gray-700/30 transition cursor-pointer bg-white dark:bg-[#1e293b]">
            <img src="/image/{{ $p[0] }}" class="w-full h-48 object-cover rounded-lg">
            <h3 class="mt-3 font-semibold dark:text-white">{{ $p[1] }}</h3>
            <div class="flex justify-between mt-1 text-xs text-gray-500 dark:text-gray-400">
                <span>4.9 (300+)</span>
                <span>Rp. 350.000</span>
            </div>
        </div>

        @endforeach

    </div>

</section>

@endsection
