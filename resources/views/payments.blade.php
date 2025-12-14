@extends('layouts.admin')

@section('title', 'Verifikasi Pembayaran')

@section('content')

<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Verifikasi Pembayaran</h1>

    <div class="bg-white dark:bg-slate-800 rounded-xl shadow p-6">

        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-3">Nama</th>
                    <th class="p-3">Paket</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Bukti Pembayaran</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($payments as $pay)
                <tr class="border-b">
                    <td class="p-3">{{ $pay->user_name ?? '-' }}</td>
                    <td class="p-3">{{ $pay->nama_paket ?? '-' }}</td>
                    <td class="p-3">Rp {{ number_format($pay->total_harga ?? 0, 0, ',', '.') }}</td>
                    <td class="p-3">
                        @if (!empty($pay->bukti))
                            <a href="{{ asset('uploads/bukti/' . $pay->bukti) }}" 
                               class="text-blue-500 underline" target="_blank">
                               Lihat Bukti
                            </a>
                        @else
                            <span class="text-gray-500">Tidak ada bukti</span>
                        @endif
                    </td>
                    <td class="p-3 flex gap-2">
                        <form action="{{ route('admin.pembayaran.verify', $pay->id) }}" method="POST">
                            @csrf
                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                                Verifikasi
                            </button>
                        </form>

                        <form action="{{ route('admin.pembayaran.reject', $pay->id) }}" method="POST">
                            @csrf
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                                Tolak
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>

@endsection
