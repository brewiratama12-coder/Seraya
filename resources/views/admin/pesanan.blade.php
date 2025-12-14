@extends('layouts.admin')

@section('page_title', 'Pesanan')
@section('title', 'Pesanan Admin')

@section('content')

{{-- Statistics Cards & Orders moved from dashboard --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-white dark:bg-[#1e293b] rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Total Paket</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalProduk }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-[#1e293b] rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Total Pesanan</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalBooking }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-[#1e293b] rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Menunggu Verifikasi</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $menungguVerifikasi }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-[#1e293b] rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Total Pendapatan</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-wallet text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>

</div>

{{-- Orders Table --}}
<div class="bg-white dark:bg-[#1e293b] rounded-xl shadow-lg p-6">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Pesanan</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $orders instanceof Illuminate\Pagination\LengthAwarePaginator ? $orders->total() : (is_countable($orders) ? count($orders) : 0) }} pesanan ditemukan</p>
        </div>
        <div class="flex gap-4 mt-4 md:mt-0 w-full md:w-auto">
            <input type="date" class="px-4 py-2 border dark:border-gray-600 rounded-lg dark:bg-[#0f172a] dark:text-white text-sm">
            <span class="text-gray-500 dark:text-gray-400">To</span>
            <input type="date" class="px-4 py-2 border dark:border-gray-600 rounded-lg dark:bg-[#0f172a] dark:text-white text-sm">
        </div>
    </div>

    <div class="flex gap-4 mb-6 border-b dark:border-gray-700">
        <a href="?tab=all" class="px-4 py-2 font-medium {{ $activeTab === 'all' ? 'text-blue-600 border-b-2 border-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">Semua pesanan</a>
        <a href="?tab=dispatch" class="px-4 py-2 font-medium {{ $activeTab === 'dispatch' ? 'text-blue-600 border-b-2 border-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">Dispatch ({{ $dispatchCount ?? 0 }})</a>
        <a href="?tab=pending" class="px-4 py-2 font-medium {{ $activeTab === 'pending' ? 'text-blue-600 border-b-2 border-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">Pending ({{ $pendingCount ?? 0 }})</a>
        <a href="?tab=selesai" class="px-4 py-2 font-medium {{ $activeTab === 'selesai' ? 'text-blue-600 border-b-2 border-blue-600 dark:text-blue-400' : 'text-gray-500 dark:text-gray-400' }}">Selesai ({{ $selesaiCount ?? 0 }})</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b dark:border-gray-700">
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">ID</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Nama</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Paket</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Tanggal</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Peserta</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Status</th>
                    <th class="px-6 py-3 text-left font-semibold text-gray-700 dark:text-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $o)
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-[#334155]">
                    <td class="px-6 py-4 text-gray-900 dark:text-white">#{{ $o->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <img src="https://via.placeholder.com/40" class="w-8 h-8 rounded-full">
                            <span class="text-gray-900 dark:text-white">{{ $o->user_name ?? 'Pengguna' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300 text-xs">{{ $o->nama_paket ?? '-' }}</td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $o->tgl_permintaan ?? '-' }}</td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $o->peserta ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($o->status === 'pending')
                            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium dark:bg-red-900 dark:text-red-200">Pending</span>
                        @elseif($o->status === 'dispatch')
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium dark:bg-blue-900 dark:text-blue-200">Dispatch</span>
                        @else
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium dark:bg-green-900 dark:text-green-200">Selesai</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            @if($o->status === 'pending')
                                <form action="{{ route('admin.permintaan.updateStatus', $o->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="dispatch">
                                    <button class="px-3 py-1 bg-blue-600 text-white rounded">Set Dispatch</button>
                                </form>
                            @endif

                            @if($o->status === 'dispatch')
                                <form action="{{ route('admin.permintaan.updateStatus', $o->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="selesai">
                                    <button class="px-3 py-1 bg-green-600 text-white rounded">Set Selesai</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-6 text-center text-gray-500">Tidak ada pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex items-center justify-between mt-6 pt-6 border-t dark:border-gray-700">
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $orders instanceof Illuminate\Pagination\LengthAwarePaginator ? 'Showing ' . $orders->firstItem() . '-' . $orders->lastItem() . ' of ' . $orders->total() : '' }}</p>
        <div class="flex gap-2">
            @if($orders instanceof Illuminate\Pagination\LengthAwarePaginator)
                {{ $orders->links() }}
            @endif
        </div>
    </div>

</div>

@endsection
