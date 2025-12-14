<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Admin - @yield('title')</title>
</head>

<body class="bg-gray-50 dark:bg-[#0f172a]">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 h-screen bg-gradient-to-br from-blue-600 to-blue-700 shadow-xl p-6 fixed left-0 top-0">
            <div class="mb-8">
                <h2 class="font-bold text-2xl text-white">Seraya</h2>
                <p class="text-blue-100 text-xs">Travel Management</p>
            </div>

            <nav class="flex flex-col gap-4">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-blue-500 transition @if(request()->routeIs('admin.dashboard')) bg-white bg-opacity-20 @endif">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('admin.pesanan') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-500 hover:text-white transition @if(request()->routeIs('admin.pesanan')) bg-white bg-opacity-20 text-white @endif">
                    <i class="fas fa-shopping-cart w-5"></i>
                    <span>Pesanan</span>
                </a>

                <a href="{{ route('admin.pembayaran.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-500 hover:text-white transition @if(request()->routeIs('admin.pembayaran.*')) bg-white bg-opacity-20 text-white @endif">
                    <i class="fas fa-money-bill-wave w-5"></i>
                    <span>Pembayaran</span>
                </a>

                <a href="{{ route('admin.paket.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-blue-100 rounded-lg hover:bg-blue-500 hover:text-white transition @if(request()->routeIs('admin.paket.*')) bg-white bg-opacity-20 text-white @endif">
                    <i class="fas fa-box w-5"></i>
                    <span>Paket Wisata</span>
                </a>
            </nav>

            <div class="absolute bottom-6 left-6 right-6">
                <div class="flex gap-2 text-blue-100 text-xs">
                    <a href="#" class="hover:text-white">Facebook</a>
                    <a href="#" class="hover:text-white">Twitter</a>
                    <a href="#" class="hover:text-white">Google</a>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 ml-64 overflow-y-auto bg-gray-50 dark:bg-[#0f172a]">
            
            {{-- Top Bar --}}
            <div class="bg-white dark:bg-[#1e293b] shadow-sm sticky top-0 z-10">
                <div class="px-8 py-4 flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">@yield('page_title', 'Dashboard')</h1>
                    <div class="flex items-center gap-4">
                        <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                            <i class="fas fa-bell text-gray-600 dark:text-gray-300 w-5"></i>
                        </button>
                        <div class="flex items-center gap-2 pl-4 border-l dark:border-gray-700">
                            <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full">
                            <div class="hidden md:block">
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">Admin</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">admin@seraya.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="p-8">
                @yield('content')
            </div>

        </main>

    </div>

</body>
</html>
