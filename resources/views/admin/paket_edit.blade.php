@extends('layouts.admin')

@section('page_title', 'Edit Paket')
@section('title', 'Edit Paket')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-xl p-6 shadow">
    <h2 class="text-xl font-bold mb-4 text-gray-900">Edit Paket: {{ $paket->nama_paket }}</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label class="block text-sm font-medium text-black">Nama Paket</label>
            <input name="nama_paket" type="text" value="{{ old('nama_paket', $paket->nama_paket) }}" class="w-full mt-2 p-3 border rounded-lg">
            @error('nama_paket') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-black">Deskripsi</label>
            <textarea name="deskripsi" class="w-full mt-2 p-3 border rounded-lg" rows="6">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            @error('deskripsi') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-black">Harga Diskon (Harga Saat Ini)</label>
                <input name="harga" type="number" step="0.01" value="{{ old('harga', $paket->harga) }}" class="w-full mt-2 p-3 border rounded-lg">
                @error('harga') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-black">Harga Asli (Sebelum Diskon)</label>
                <input name="harga_asli" type="number" step="0.01" value="{{ old('harga_asli', $paket->harga_asli) }}" class="w-full mt-2 p-3 border rounded-lg">
                @error('harga_asli') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-black">Status</label>
                <select name="status" class="w-full mt-2 p-3 border rounded-lg">
                    <option value="tersedia" {{ old('status', $paket->status) === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak_tersedia" {{ old('status', $paket->status) === 'tidak_tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                </select>
                @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-black">Gambar Paket</label>
            @if($paket->gambar)
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/' . $paket->gambar) }}" class="w-48 h-28 object-cover rounded">
                </div>
            @endif
            <input name="gambar" type="file" class="w-full mt-2 p-2 border rounded-lg">
            @error('gambar') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-6 flex gap-3">
            <button class="px-4 py-2 bg-[#213555] hover:bg-[#1b2f4a] text-white rounded-lg">Simpan perubahan</button>
            <a href="/home" class="px-4 py-2 border border-[#213555] text-[#213555] hover:bg-[#1b2f4a] hover:text-white rounded-lg">Batal</a>
        </div>
    </form>

</div>

@endsection
