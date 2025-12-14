{{-- resources/views/detail_produk.blade.php --}}
@extends('layouts.main')

@section('title', 'Detail Produk')

@section('content')
<!-- DETAIL PRODUK + BOOKING -->
<div class="max-w-6xl mx-auto px-6 py-10">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
    {{-- FOTO PRODUK --}}
    <div class="rounded-xl overflow-hidden shadow-lg">
      <img src="{{ asset('image/bromo1.jpg') }}" alt="Paket Bromo" class="w-full h-[520px] object-cover">
    </div>

    {{-- DETAIL + FORM --}}
    <div class="space-y-6">
      <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Paket Open Trip </h1>
        <p class="mt-2 text-gray-600 dark:text-gray-300 leading-relaxed">
         Nikmati serunya perjalanan bersama peserta lain ke destinasi wisata pilihan dengan harga terjangkau, fasilitas lengkap, dan pendampingan pemandu profesional. Cocok untuk solo traveler maupun yang ingin menambah relasi.
        </p>

        <div class="mt-4 inline-flex items-baseline gap-3">
          <div class="text-2xl md:text-3xl font-extrabold text-[#1f3b5a] dark:text-blue-300">
            Rp <span id="hargaSatuan">250000</span> <span class="text-sm font-medium text-gray-500">/ orang</span>
          </div>
        </div>

        <ul class="mt-4 list-disc ml-5 text-gray-700 dark:text-gray-300">
          <li>Jeep Offroad (return)</li>
          <li>Dokumentasi kamera</li>
          <li>Air mineral & sarapan</li>
          <li>Guide berpengalaman</li>
        </ul>
      </div>

      {{-- FORM BOOKING --}}
      <form id="bookingForm" class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow" enctype="multipart/form-data">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Booking Sekarang</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
            <input id="nama" type="text" required
              class="mt-1 w-full px-4 py-2 rounded-lg border dark:bg-[#0f1724] dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-200"
              placeholder="Nama lengkap">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">No. HP</label>
            <input id="nomor" type="tel" required
              class="mt-1 w-full px-4 py-2 rounded-lg border dark:bg-[#0f1724] dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-200"
              placeholder="0812xxxx">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input id="email" type="email" required
              class="mt-1 w-full px-4 py-2 rounded-lg border dark:bg-[#0f1724] dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-200"
              placeholder="email@example.com">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Orang</label>
            <input id="jumlahOrang" type="number" min="1" value="1"
              class="mt-1 w-full px-4 py-2 rounded-lg border dark:bg-[#0f1724] dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-200">
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Keberangkatan</label>
            <input id="tanggal" type="date" required
              class="mt-1 w-full px-4 py-2 rounded-lg border dark:bg-[#0f1724] dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-200">
          </div>

          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catatan (opsional)</label>
            <input id="catatan" type="text"
              class="mt-1 w-full px-4 py-2 rounded-lg border dark:bg-[#0f1724] dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-200"
              placeholder="Misal: permintaan khusus kendaraan / diet makanan">
          </div>
        </div>

        {{-- TOTAL --}}
        <div class="mt-6 flex items-center justify-between bg-gray-50 dark:bg-[#0b1420] p-4 rounded-lg">
          <div class="text-sm text-gray-700 dark:text-gray-200">Total Harga</div>
          <div class="text-xl font-bold text-[#1f3b5a] dark:text-blue-300">Rp <span id="totalHarga">350.000</span></div>
        </div>

        {{-- TOMBOL --}}
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-3">
          <div class="md:col-span-3">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bukti Pembayaran (opsional)</label>
            <input type="file" id="proofFile" name="proof" accept="image/*,application/pdf"
                   class="mt-1 w-full rounded-lg border px-3 py-2 dark:bg-[#0f1724] dark:text-white">
            <p class="text-xs text-gray-500 mt-2">Format: JPG/PNG/PDF. Maks 5MB.</p>
          </div>
          <button id="btnBayar" type="button"
            class="col-span-2 bg-[#1f3b5a] hover:bg-[#172a45] text-white py-3 rounded-lg font-semibold transition">
            Pesan & Bayar (QRIS)
          </button>

          <button id="btnInvoice" type="button"
            class="bg-white dark:bg-slate-700 border border-gray-200 dark:border-slate-600 text-gray-800 dark:text-gray-100 py-3 rounded-lg hover:shadow transition">
            Lihat Invoice
          </button>
        </div>
      </form>

      {{-- Bagian upload bukti dihapus — digabung dalam form di atas --}}

    </div>
  </div>
</div>

<!-- MODAL QRIS -->
<div id="modalQRIS" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
  <div class="bg-white dark:bg-slate-800 rounded-xl w-[520px] p-6 shadow-xl">
    <div class="flex items-center justify-between">
      <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Pembayaran QRIS</h3>
      <button onclick="closeQRIS()" class="text-gray-500 hover:text-gray-700">&times;</button>
    </div>

    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="flex flex-col items-center justify-center p-4 border rounded-lg">
        <img src="{{ asset('image/qris.jpeg') }}" alt="QRIS" class="w-96 h-96 object-contain">
        <p class="mt-3 text-sm text-gray-600 dark:text-gray-300">Scan QR di atas untuk melakukan pembayaran.</p>
      </div>

      <div class="p-4">
        <div class="text-sm text-gray-600 dark:text-gray-300">Total yang harus dibayar</div>
        <div class="mt-2 text-2xl font-bold text-[#1f3b5a] dark:text-blue-300" id="qrisTotal">Rp 0</div>

        <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Setelah membayar, jangan lupa unggah bukti pembayaran di bagian "Kirim Bukti Pembayaran".</p>

        <div class="mt-6 space-y-3">
          <button onclick="confirmPaymentMock()" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-lg">Saya Sudah Bayar</button>
          <button onclick="downloadInvoice()" class="w-full bg-transparent border border-gray-300 dark:border-slate-600 text-gray-800 dark:text-gray-200 py-2 rounded-lg">Unduh Invoice</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INVOICE -->
<div id="invoiceModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
  <div class="bg-white dark:bg-slate-800 w-[640px] p-6 rounded-xl shadow-xl">
    <div class="flex items-start justify-between">
      <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Invoice Pemesanan</h3>
        <p class="text-sm text-gray-500 dark:text-gray-300">Simpan atau cetak invoice ini untuk bukti.</p>
      </div>
      <div class="flex gap-2">
        <button id="printInvoice" class="px-3 py-2 bg-white border rounded hover:shadow">Cetak</button>
        <button onclick="closeInvoice()" class="px-3 py-2 bg-gray-100 rounded hover:bg-gray-200">Tutup</button>
      </div>
    </div>

    <div id="invoiceContent" class="mt-4 text-sm text-gray-700 dark:text-gray-300">
      {{-- Diisi lewat JS --}}
      <div class="mb-3">
        <strong>Nama:</strong> <span id="invNama"></span><br>
        <strong>No HP:</strong> <span id="invNomor"></span><br>
        <strong>Email:</strong> <span id="invEmail"></span><br>
        <strong>Tanggal:</strong> <span id="invTanggal"></span><br>
      </div>

      <table class="w-full text-sm">
        <thead>
          <tr class="text-left text-gray-600 dark:text-gray-400">
            <th>Deskripsi</th>
            <th class="text-right">Qty</th>
            <th class="text-right">Harga</th>
          </tr>
        </thead>
        <tbody id="invRows"></tbody>
      </table>

      <div class="mt-4 flex justify-between">
        <div class="text-sm text-gray-600 dark:text-gray-400">Total</div>
        <div class="text-lg font-bold text-[#1f3b5a] dark:text-blue-300" id="invTotal">Rp 0</div>
      </div>
    </div>
  </div>
</div>

<!-- NOTIF -->
<div id="notif" class="fixed right-6 bottom-6 bg-emerald-600 text-white px-4 py-3 rounded-lg shadow-lg hidden z-60"></div>

<!-- SCRIPTS -->
<script>
  // Basic elements
  const hargaSatuan = Number(document.getElementById('hargaSatuan').innerText);
  const jumlahInput = document.getElementById('jumlahOrang');
  const totalEl = document.getElementById('totalHarga');

  function formatRupiah(num){
    return num.toLocaleString('id-ID');
  }

  function updateTotal(){
    const qty = Math.max(1, Number(jumlahInput.value || 1));
    const total = qty * hargaSatuan;
    totalEl.innerText = formatRupiah(total);
  }

  jumlahInput.addEventListener('input', updateTotal);
  updateTotal();

  // QRIS modal logic
  const modalQRIS = document.getElementById('modalQRIS');
  const invoiceModal = document.getElementById('invoiceModal');
  const qrisTotalEl = document.getElementById('qrisTotal');

  document.getElementById('btnBayar').addEventListener('click', () => {
    const qty = Math.max(1, Number(jumlahInput.value || 1));
    const total = qty * hargaSatuan;
    qrisTotalEl.innerText = "Rp " + formatRupiah(total);
    modalQRIS.classList.remove('hidden');
  });

  function closeQRIS(){
    modalQRIS.classList.add('hidden');
  }

  // Confirm payment: create order and pending payment on server
  function confirmPaymentMock(){
    const jumlah = document.getElementById('jumlahOrang')?.value || 1;
    const tanggal = document.getElementById('tanggal')?.value || new Date().toISOString().slice(0,10);
    const catatan = document.getElementById('catatan')?.value || '';
    const csrf = document.querySelector('meta[name=\"csrf-token\"]')?.getAttribute('content') || '';
    const file = document.getElementById('proofFile')?.files?.[0];
    if (file && file.size > 5 * 1024 * 1024) {
      showNotif('File terlalu besar (max 5MB).', 3000);
      return;
    }

    const fd = new FormData();
    fd.append('jumlahOrang', jumlah);
    fd.append('tanggal', tanggal);
    fd.append('catatan', catatan);
    fd.append('paket_jenis', 'open');
    fd.append('_token', csrf);
    if (file) fd.append('proof', file);

    fetch('{{ route('booking.confirmPayment') }}', {
      method: 'POST',
      body: fd
    }).then(async res => {
      let data = {};
      try { data = await res.json(); } catch (e) { }
      if (res.ok) return data;
      const msg = data?.message || (data?.errors ? Object.values(data.errors).flat()[0] : 'Gagal membuat pesanan');
      throw new Error(msg);
    }).then(data => {
      modalQRIS.classList.add('hidden');
      showNotif('Pembayaran dikonfirmasi. Pesanan dibuat.', 4500);
    }).catch(err => {
      console.error(err);
      showNotif(err.message || 'Gagal konfirmasi pembayaran.', 4500);
    });
  }

  // Invoice modal
  document.getElementById('btnInvoice').addEventListener('click', showInvoice);
  function showInvoice(){
    // fill invoice fields
    document.getElementById('invNama').innerText = document.getElementById('nama').value || '-';
    document.getElementById('invNomor').innerText = document.getElementById('nomor').value || '-';
    document.getElementById('invEmail').innerText = document.getElementById('email').value || '-';
    document.getElementById('invTanggal').innerText = document.getElementById('tanggal').value || '-';

    const qty = Math.max(1, Number(jumlahInput.value || 1));
    const total = qty * hargaSatuan;

    const invRows = document.getElementById('invRows');
    invRows.innerHTML = `
      <tr>
        <td>Paket Wisata Bromo Sunrise</td>
        <td class="text-right">${qty}</td>
        <td class="text-right">Rp ${formatRupiah(hargaSatuan)}</td>
      </tr>
    `;
    document.getElementById('invTotal').innerText = "Rp " + formatRupiah(total);

    invoiceModal.classList.remove('hidden');
  }

  function closeInvoice(){
    invoiceModal.classList.add('hidden');
  }

  // Download invoice as HTML file (simple)
  function downloadInvoice(){
    // Grab invoice HTML and make a printable blob
    const nama = document.getElementById('invNama').innerText;
    const nomor = document.getElementById('invNomor').innerText;
    const email = document.getElementById('invEmail').innerText;
    const tanggal = document.getElementById('invTanggal').innerText;
    const invTotal = document.getElementById('invTotal').innerText;
    const qty = Math.max(1, Number(jumlahInput.value || 1));

    const html = `
      <html>
        <head>
          <meta charset="utf-8">
          <title>Invoice - ${nama}</title>
          <style>
            body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; padding: 20px; color: #111827; }
            .header { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
            .box { border:1px solid #e5e7eb; padding:16px; border-radius:8px; }
            table { width:100%; border-collapse: collapse; margin-top:12px; }
            td, th { padding:8px 6px; border-bottom:1px solid #eef2f7; text-align:left; }
            .right { text-align:right; }
            .total { font-weight:700; font-size:18px; text-align:right; }
          </style>
        </head>
        <body>
          <div class="header">
            <div>
              <h2>Invoice Pemesanan</h2>
              <div>${new Date().toLocaleString()}</div>
            </div>
            <div>
              <strong>Seraya Travel</strong><br>
              Jl. Diponegoro No.45, Malang
            </div>
          </div>

          <div class="box">
            <div><strong>Nama:</strong> ${nama}</div>
            <div><strong>No HP:</strong> ${nomor}</div>
            <div><strong>Email:</strong> ${email}</div>
            <div><strong>Tanggal:</strong> ${tanggal}</div>

            <table>
              <thead>
                <tr><th>Deskripsi</th><th class="right">Qty</th><th class="right">Harga</th></tr>
              </thead>
              <tbody>
                <tr><td>Paket Wisata Bromo Sunrise</td><td class="right">${qty}</td><td class="right">Rp ${formatRupiah(hargaSatuan)}</td></tr>
              </tbody>
            </table>

            <div class="total" style="margin-top:12px">Total: ${invTotal}</div>
          </div>
        </body>
      </html>
    `;

    const blob = new Blob([html], {type: 'text/html'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download =`invoice_${(nama||'customer').replace(/\s+/g,'_')}.html`;
    a.click();
    URL.revokeObjectURL(url);
    showNotif('Invoice siap diunduh.', 3000);
  }

  // Print invoice
  document.getElementById('printInvoice').addEventListener('click', () => {
    const printWindow = window.open('', '_blank', 'width=800,height=600');
    const invoiceHtml = document.getElementById('invoiceContent').innerHTML;
    printWindow.document.write(`
      <html><head><title>Invoice</title>
      <style>body{font-family:Arial,Helvetica,sans-serif;padding:20px;color:#111}</style>
      </head><body>${invoiceHtml}</body></html>`);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
  });

  // Simple notification
  function showNotif(text, duration=3000){
    const n = document.getElementById('notif');
    n.innerText = text;
    n.classList.remove('hidden');
    setTimeout(()=> n.classList.add('hidden'), duration);
  }

</script>

<!-- small styles for dark-mode compatibility if needed -->
<style>
  /* ensure modals are above other content */
  #modalQRIS, #invoiceModal { z-index: 9999; }

  /* small responsive tweak */
  @media (max-width:640px){
    .w-[520px] { width: 92% !important; }
    .w-[640px] { width: 92% !important; }
  }
</style>

@endsection
