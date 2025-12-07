@extends('layouts.main')
@section('title', 'Detail Produk')

@section('content')

<div class="max-w-6xl mx-auto px-6 pt-10">

    {{-- GRID KIRI FOTO, KANAN DETAIL --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        {{-- FOTO PRODUK --}}
        <div>
            <img src="{{ asset('image/bromo1.jpg') }}" 
                 class="w-full rounded-xl shadow-lg object-cover">
        </div>

        {{-- DETAIL PRODUK --}}
        <div class="space-y-4">

            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                Paket Wisata Bromo Sunrise
            </h1>

            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                Nikmati keindahan sunrise di Gunung Bromo dengan fasilitas lengkap,
                mulai dari jeep, dokumentasi, sampai makan pagi.
            </p>

            <div class="text-2xl font-semibold text-[#213555] dark:text-blue-300">
                Rp <span id="hargaSatuan">350000</span> / orang
            </div>

            <ul class="list-disc ml-5 text-gray-700 dark:text-gray-300">
                <li>Include Jeep Offroad</li>
                <li>Dokumentasi Kamera</li>
                <li>Air Mineral</li>
                <li>Makan Pagi</li>
            </ul>

        </div>
    </div>


    {{-- FORM BOOKING --}}
    <form id="bookingForm" class="mt-12 bg-white dark:bg-[#182230] p-6 rounded-2xl shadow-lg max-w-3xl mx-auto">

        <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-white">
            Booking Sekarang
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama Lengkap --}}
            <div class="md:col-span-2">
                <label class="text-gray-700 dark:text-gray-300 text-sm">Nama Lengkap</label>
                <input id="nama" type="text"
                       class="mt-1 w-full p-3 rounded-lg border dark:bg-[#1f2b3a] dark:text-white"
                       placeholder="Masukkan nama Anda" required>
            </div>

            {{-- Nomor HP --}}
            <div>
                <label class="text-gray-700 dark:text-gray-300 text-sm">Nomor HP</label>
                <input id="nomor" type="text"
                       class="mt-1 w-full p-3 rounded-lg border dark:bg-[#1f2b3a] dark:text-white"
                       placeholder="08xxxx" required>
            </div>

            {{-- Email --}}
            <div>
                <label class="text-gray-700 dark:text-gray-300 text-sm">Email</label>
                <input id="email" type="email"
                       class="mt-1 w-full p-3 rounded-lg border dark:bg-[#1f2b3a] dark:text-white"
                       placeholder="email@example.com" required>
            </div>

            {{-- Jumlah Orang --}}
            <div>
                <label class="text-gray-700 dark:text-gray-300 text-sm">Jumlah Orang</label>
                <input type="number" id="jumlahOrang" min="1" value="1"
                       class="mt-1 w-full p-3 rounded-lg border dark:bg-[#1f2b3a] dark:text-white">
            </div>

            {{-- Tanggal --}}
            <div>
                <label class="text-gray-700 dark:text-gray-300 text-sm">Tanggal Keberangkatan</label>
                <input id="tanggal" type="date"
                       class="mt-1 w-full p-3 rounded-lg border dark:bg-[#1f2b3a] dark:text-white" required>
            </div>

        </div>

        {{-- TOTAL HARGA --}}
        <div class="mt-6 bg-gray-100 dark:bg-[#1f2b3a] p-4 rounded-xl flex justify-between items-center">
            <span class="text-gray-700 dark:text-gray-200 font-medium">Total Harga:</span>
            <span class="text-xl font-bold text-[#213555] dark:text-blue-300">
                Rp <span id="totalHarga">350.000</span>
            </span>
        </div>

        {{-- TOMBOL --}}
        <button id="btnBayar"
                type="button"
                class="mt-6 w-full bg-[#213555] text-white p-3 rounded-xl text-sm font-semibold hover:bg-[#1a2a44] transition">
            Pesan Sekarang
        </button>

    </form>

</div>


{{-- ===================== MODAL QRIS ===================== --}}
<div id="modalQRIS"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-[999]">

    <div class="bg-white dark:bg-[#182230] w-96 p-6 rounded-2xl shadow-lg">

        <h3 class="text-xl font-semibold text-center mb-4 text-gray-800 dark:text-white">
            Pembayaran QRIS
        </h3>

        <img src="{{ asset('image/qris.png') }}" class="w-full rounded-lg shadow">

        <p class="text-center text-gray-700 dark:text-gray-300 mt-4">
            Total bayar: <span id="qrisTotal" class="font-bold"></span>
        </p>

        <button onclick="closeQRIS()"
                class="mt-5 w-full bg-gray-700 text-white p-2 rounded-lg hover:bg-gray-800">
            Tutup
        </button>

        {{-- Tombol Lihat Invoice --}}
        <button onclick="showInvoice()"
                class="mt-3 w-full bg-[#213555] text-white p-2 rounded-lg hover:bg-[#1b2f4a]">
            Lihat Invoice
        </button>

    </div>
</div>


{{-- ===================== INVOICE ===================== --}}
<div id="invoiceSection"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-[999]">

    <div class="bg-white dark:bg-[#182230] w-[500px] p-6 rounded-2xl shadow-lg">

        <h3 class="text-xl font-bold text-gray-800 dark:text-white text-center mb-4">
            INVOICE PEMESANAN
        </h3>

        <div class="space-y-2 text-gray-700 dark:text-gray-300">
            <p><strong>Nama:</strong> <span id="invNama"></span></p>
            <p><strong>No HP:</strong> <span id="invNomor"></span></p>
            <p><strong>Email:</strong> <span id="invEmail"></span></p>
            <p><strong>Tanggal:</strong> <span id="invTanggal"></span></p>
            <p><strong>Jumlah Orang:</strong> <span id="invJumlah"></span></p>
            <p><strong>Total Harga:</strong> <span id="invTotal"></span></p>
        </div>

        <button onclick="closeInvoice()"
                class="mt-5 w-full bg-[#213555] text-white p-2 rounded-lg">
            Tutup Invoice
        </button>

    </div>
</div>


{{-- ===================== SCRIPT ===================== --}}
<script>
    const jumlah = document.getElementById('jumlahOrang');
    const harga = parseInt(document.getElementById('hargaSatuan').innerText);

    function updateTotal() {
        let total = jumlah.value * harga;
        document.getElementById('totalHarga').innerText = total.toLocaleString('id-ID');
    }

    jumlah.addEventListener('input', updateTotal);
    updateTotal();


    // ---- TOMBOL BAYAR ----
    document.getElementById('btnBayar').onclick = () => {
        let total = jumlah.value * harga;
        document.getElementById('qrisTotal').innerText = "Rp " + total.toLocaleString('id-ID');
        document.getElementById('modalQRIS').classList.remove('hidden');
    }

    function closeQRIS() {
        document.getElementById('modalQRIS').classList.add('hidden');
    }


    // ---- SHOW INVOICE ----
    function showInvoice() {
        document.getElementById('invNama').innerText = document.getElementById('nama').value;
        document.getElementById('invNomor').innerText = document.getElementById('nomor').value;
        document.getElementById('invEmail').innerText = document.getElementById('email').value;
        document.getElementById('invTanggal').innerText = document.getElementById('tanggal').value;
        document.getElementById('invJumlah').innerText = jumlah.value;
        document.getElementById('invTotal').innerText = "Rp " + (jumlah.value * harga).toLocaleString('id-ID');

        document.getElementById('invoiceSection').classList.remove('hidden');
    }

    function closeInvoice() {
        document.getElementById('invoiceSection').classList.add('hidden');
    }
</script>

@endsection
