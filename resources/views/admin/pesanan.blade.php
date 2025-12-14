@extends('layouts.admin')

@section('page_title', 'Pesanan')
@section('title', 'Pesanan Admin')

@section('content')

{{-- Statistics Cards & Orders moved from dashboard --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-black text-sm">Total Paket</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalProduk }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-black text-sm">Total Pesanan</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalBooking }}</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-shopping-cart text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-black text-sm">Menunggu Verifikasi</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $menungguVerifikasi }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-black text-sm">Total Pendapatan</p>
                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-wallet text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>

</div>

{{-- Orders Table --}}
<div class="bg-white rounded-xl shadow-lg p-6">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Pesanan</h2>
            <p class="text-sm text-black">{{ $orders instanceof Illuminate\Pagination\LengthAwarePaginator ? $orders->total() : (is_countable($orders) ? count($orders) : 0) }} pesanan ditemukan</p>
        </div>
        <div class="flex gap-4 mt-4 md:mt-0 w-full md:w-auto">
            <input type="date" class="px-4 py-2 border dark:border-gray-600 rounded-lg dark:bg-[#0f172a] dark:text-white text-sm">
            <span class="text-black">To</span>
            <input type="date" class="px-4 py-2 border dark:border-gray-600 rounded-lg dark:bg-[#0f172a] dark:text-white text-sm">
        </div>
    </div>

    <div class="flex gap-4 mb-6 border-b">
        <a href="?tab=all" class="px-4 py-2 font-medium {{ $activeTab === 'all' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-black' }}">Semua pesanan</a>
        <a href="?tab=dispatch" class="px-4 py-2 font-medium {{ $activeTab === 'dispatch' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-black' }}">Dispatch ({{ $dispatchCount ?? 0 }})</a>
        <a href="?tab=pending" class="px-4 py-2 font-medium {{ $activeTab === 'pending' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-black' }}">Pending ({{ $pendingCount ?? 0 }})</a>
        <a href="?tab=selesai" class="px-4 py-2 font-medium {{ $activeTab === 'selesai' ? 'text-blue-600 border-b-2 border-blue-600' : 'text-black' }}">Selesai ({{ $selesaiCount ?? 0 }})</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-3 text-left font-semibold text-black">ID</th>
                    <th class="px-6 py-3 text-left font-semibold text-black">Nama</th>
                    <th class="px-6 py-3 text-left font-semibold text-black">Paket</th>
                    <th class="px-6 py-3 text-left font-semibold text-black">Tanggal</th>
                    <th class="px-6 py-3 text-left font-semibold text-black">Peserta</th>
                    <th class="px-6 py-3 text-left font-semibold text-black">Status</th>
                    <th class="px-6 py-3 text-left font-semibold text-black">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $o)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-900 dark:text-white">#{{ $o->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <img src="https://via.placeholder.com/40" class="w-8 h-8 rounded-full">
                            <span class="text-gray-900 dark:text-white">{{ $o->user_name ?? 'Pengguna' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-black text-xs">{{ $o->nama_paket ?? '-' }}</td>
                    <td class="px-6 py-4 text-black">{{ $o->tgl_permintaan ?? '-' }}</td>
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
                        <div class="relative inline-block text-left">
                            <button type="button"
                                    class="px-3 py-1 bg-[#213555] hover:bg-[#1b2f4a] text-white rounded flex items-center gap-2"
                                    data-dropdown="dd-{{ $o->id }}">
                                Aksi
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="dd-{{ $o->id }}"
                                 class="hidden absolute right-0 z-20 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-[#0f172a] ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    @if($o->status === 'pending')
                                        <form action="{{ route('admin.permintaan.updateStatus', $o->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="dispatch">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white bg-[#213555] hover:bg-[#1b2f4a] rounded">
                                                Set Dispatch
                                            </button>
                                        </form>
                                    @endif
                                    @if($o->status === 'dispatch')
                                        <form action="{{ route('admin.permintaan.updateStatus', $o->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="selesai">
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white bg-[#213555] hover:bg-[#1b2f4a] rounded">
                                                Set Selesai
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.permintaan.accept', $o->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white bg-[#213555] hover:bg-[#1b2f4a] rounded">
                                            Accept (Lunas)
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.permintaan.reject', $o->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-white bg-[#213555] hover:bg-[#1b2f4a] rounded">
                                            Rejected (Gagal)
                                        </button>
                                    </form>
                                </div>
                            </div>
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

<script>
document.addEventListener('click', function(e){
  const trigger = e.target.closest('[data-dropdown]');
  document.querySelectorAll('[id^="dd-"]').forEach(el => { if (el) el.classList.add('hidden'); });
  if (trigger) {
    const id = trigger.getAttribute('data-dropdown');
    const menu = document.getElementById(id);
    if (menu) menu.classList.toggle('hidden');
  }
});
</script>

@endsection
