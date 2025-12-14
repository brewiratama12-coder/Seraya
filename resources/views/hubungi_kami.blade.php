@extends('layouts.main')

@section('title', 'Hubungi Kami')

@section('content')

<main class="max-w-6xl mx-auto px-6 py-12">

    <!-- Header -->
    <header class="mb-8 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 dark:text-white">
            Halo! Ada yang bisa dibantu? 
        </h1>

        <p class="mt-2 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
            Punya pertanyaan atau mau ngobrol soal rencana perjalanan? Tinggal pilih cara yang paling mudah buat kamu.
        </p>
    </header>

    <div class="grid gap-8 md:grid-cols-3">

        {{-- LEFT SIDE --}}
        <aside class="space-y-6 md:col-span-1">

            {{-- WhatsApp --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow p-5">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-emerald-500/10 text-emerald-600 rounded-full flex items-center justify-center">
                        {{-- whatsapp icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.52 3.48A11.84 11.84 0 0012 0C5.373 0 .03 5.343.03 12c0 2.113.553 4.17 1.6 5.99L0 24l6.26-1.64A11.92 11.92 0 0012 24c6.627 0 11.97-5.343 11.97-12 0-3.2-1.23-6.214-3.45-8.52z" />
                        </svg>
                    </div>

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold dark:text-white">Chat WhatsApp</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Butuh jawaban cepat? Klik tombol ini, kita chat via WA.
                        </p>

                        <a href="https://wa.me/6281234567890?text=Halo%20Seraya%2C%20saya%20mau%20tanya%20tentang%20paket%20wisata"
                           target="_blank"
                           class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-600 text-white text-sm shadow hover:bg-emerald-700 transition">
                            Chat via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            {{-- Email --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow p-5">
                <div class="flex items-start gap-4">

                    <div class="w-12 h-12 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center">
                        {{-- mail icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold dark:text-white">Email</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Untuk pertanyaan detail atau kirim lampiran, email aja.
                        </p>
                        <a href="mailto:support@seraya.com"
                           class="mt-4 inline-block text-sm text-indigo-700 hover:underline">
                            support@seraya.com
                        </a>
                    </div>

                </div>
            </div>

            {{-- Lokasi --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow p-5">
                <div class="flex items-start gap-4">

                    <div class="w-12 h-12 bg-sky-100 text-sky-700 rounded-full flex items-center justify-center">
                        {{-- map icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                  d="M17 21v-8l4-2V7l-4 2V3l-8 4v8l-4 2v4l4-2v-8l8-4"/>
                        </svg>
                    </div>

                    <div class="flex-1">
                        <h3 class="text-lg font-semibold dark:text-white">Kantor / Meeting Point</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            Jl. Diponegoro No.45, Malang. Kalau mau menitip barang, kabarin dulu ya.
                        </p>

                        <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Diponegoro+No.+45+Malang"
                           target="_blank"
                           class="mt-4 inline-block text-sm text-sky-700 hover:underline">
                            Buka di Google Maps
                        </a>
                    </div>

                </div>
            </div>

            {{-- Jam Operasional --}}
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow p-5">
                <h4 class="font-semibold dark:text-white">Jam Operasional</h4>
                <ul class="text-sm text-gray-600 dark:text-gray-400 mt-2 space-y-1">
                    <li>Sen–Jum: 08.00 — 21.00</li>
                    <li>Sab–Ming: 09.00 — 18.00</li>
                    <li class="text-xs text-gray-500">(Respon chat mungkin sedikit lebih lama di luar jam ini)</li>
                </ul>
            </div>

        </aside>

        {{-- RIGHT FORM --}}
        <section class="md:col-span-2">

            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow p-6">
                <h2 class="text-2xl font-bold dark:text-white">
                    Kirim pesan ke tim Seraya - santai aja 
                </h2>

                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    Isi form di bawah, kami akan balas secepat mungkin.
                </p>

                {{-- Alert --}}
                <div id="alert"
                     class="hidden mt-4 px-4 py-3 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-800">
                    Pesan terkirim — terima kasih! 🎉
                </div>

                {{-- FORM --}}
                <form id="contactForm" class="mt-6 grid grid-cols-1 gap-4">

                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input id="name" type="text" required
                               class="mt-1 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                               placeholder="Nama lengkap kamu">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input id="email" type="email" required
                                   class="mt-1 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                                   placeholder="name@email.com">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700 dark:text-gray-300">No. WhatsApp</label>
                            <input id="wa" type="tel"
                                   class="mt-1 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                                   placeholder="0812xxxxxx">
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Pesan</label>
                        <textarea id="message" rows="5" required
                                  class="mt-1 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                                  placeholder="Misal: mau tanya paket sunrise Bromo untuk 4 orang."></textarea>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <input id="consent" type="checkbox" class="w-4 h-4">
                            <label for="consent" class="text-sm text-gray-600 dark:text-gray-300">
                                Boleh kami hubungi via WhatsApp?
                            </label>
                        </div>

                        <button type="submit"
                                class="ml-auto inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#213555] text-white hover:bg-[#1b2f4a] transition">
                            Kirim Pesan
                        </button>
                    </div>

                </form>

                <p class="text-xs text-gray-500 mt-3">
                    Biasanya kami balas dalam 1–6 jam di jam kerja. Kalau urgent, lebih cepat pakai WhatsApp.
                </p>
            </div>

        </section>

    </div>
</main>

{{-- Script --}}
<script>
    const form = document.getElementById('contactForm');
    const alertBox = document.getElementById('alert');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();

        if (!name || !email || !message) {
            alert('Silakan isi semua kolom wajib.');
            return;
        }

        alertBox.classList.remove('hidden');
        form.reset();

        setTimeout(() => alertBox.classList.add('hidden'), 4000);
    });
</script>

@endsection
