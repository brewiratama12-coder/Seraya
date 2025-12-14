@extends('layouts.admin')

@section('page_title', 'Edit Paket')
@section('title', 'Edit Paket')

@section('content')

<div class="max-w-4xl mx-auto bg-white dark:bg-[#0f172a] rounded-xl p-6 shadow">
    <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Edit Paket: {{ $paket->nama_paket }}</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Paket</label>
            <input name="nama_paket" type="text" value="{{ old('nama_paket', $paket->nama_paket) }}" class="w-full mt-2 p-3 border rounded-lg dark:bg-[#0f172a] dark:border-gray-700">
            @error('nama_paket') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
            <textarea name="deskripsi" class="w-full mt-2 p-3 border rounded-lg dark:bg-[#0f172a] dark:border-gray-700" rows="6">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Harga (Rp)</label>
                <input name="harga" type="number" step="0.01" value="{{ old('harga', $paket->harga) }}" class="w-full mt-2 p-3 border rounded-lg dark:bg-[#0f172a] dark:border-gray-700">
                @error('harga') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                <select name="status" class="w-full mt-2 p-3 border rounded-lg dark:bg-[#0f172a] dark:border-gray-700">
                    <option value="tersedia" {{ old('status', $paket->status) === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak_tersedia" {{ old('status', $paket->status) === 'tidak_tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                </select>
                @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Gambar Paket</label>
            @if($paket->gambar)
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/' . $paket->gambar) }}" class="w-48 h-28 object-cover rounded">
                </div>
            @endif
            <input name="gambar" type="file" class="w-full mt-2 p-2 border rounded-lg dark:bg-[#0f172a] dark:border-gray-700">
            @error('gambar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-6 flex gap-3">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan perubahan</button>
            <a href="/home" class="px-4 py-2 border rounded-lg">Batal</a>
        </div>
    </form>

</div>

@endsection
