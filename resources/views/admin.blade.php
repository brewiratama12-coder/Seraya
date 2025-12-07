<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin - @yield('title')</title>
</head>

<body class="bg-gray-100 dark:bg-slate-900">

    {{-- Sidebar --}}
    <div class="flex">

        <aside class="w-64 h-screen bg-white dark:bg-slate-800 shadow p-6">
            <h2 class="font-bold text-xl mb-6">Admin Panel</h2>

            <nav class="flex flex-col gap-3">
                <a href="/admin/dashboard" class="hover:text-blue-600">Dashboard</a>
                <a href="/admin/products" class="hover:text-blue-600">Kelola Produk</a>
                <a href="/admin/payments" class="hover:text-blue-600">Verifikasi Pembayaran</a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</body>
</html>
