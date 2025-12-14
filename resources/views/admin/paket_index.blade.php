@extends('layouts.admin')

@section('page_title', 'Paket Wisata')
@section('title', 'Paket Wisata')

@section('content')

<div class="bg-white rounded-xl p-6 shadow">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-black">Daftar Paket</h2>
        <div class="flex items-center gap-4">
            <form method="GET" action="{{ route('admin.paket.index') }}">
                <input name="q" value="{{ $q ?? '' }}" placeholder="Cari paket..." class="px-3 py-2 border rounded-lg" />
                <button class="ml-2 px-3 py-2 bg-[#213555] hover:bg-[#1b2f4a] text-white rounded">Cari</button>
            </form>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Nama Paket</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pakets as $p)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $p->id }}</td>
                    <td class="px-4 py-3 flex items-center gap-3">
                        @if($p->gambar)
                            <img src="{{ asset('storage/' . $p->gambar) }}" class="w-12 h-12 object-cover rounded" />
                        @else
                            <div class="w-12 h-12 bg-gray-100 rounded"></div>
                        @endif
                        <div>
                            <div class="font-medium text-black">{{ $p->nama_paket }}</div>
                            <div class="text-sm text-black leading-relaxed">{{ $p->deskripsi }}</div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ $p->status }}</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.paket.edit', $p->id) }}" class="px-3 py-1 bg-[#213555] hover:bg-[#1b2f4a] text-white rounded">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $pakets->links() }}
    </div>

</div>

@endsection
