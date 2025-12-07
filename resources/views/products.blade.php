@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Kelola Produk</h1>

        <a href="{{ route('admin.products.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Tambah Produk
        </a>
    </div>


    <div class="bg-white dark:bg-slate-800 rounded-xl shadow p-6">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="p-3">Gambar</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $p)
                <tr class="border-b">
                    <td class="p-3">
                        <img src="{{ asset('uploads/produk/' . $p->gambar) }}" class="w-16 h-16 object-cover rounded">
                    </td>
                    <td class="p-3">{{ $p->nama }}</td>
                    <td class="p-3">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="p-3 flex gap-2">

                        <a href="{{ route('admin.products.edit', $p->id) }}"
                           class="px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                           Edit
                        </a>

                        <form method="POST" action="{{ route('admin.products.delete', $p->id) }}">
                            @csrf
                            <button class="px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Hapus
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
