<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>

    <title>@yield('title')</title>
</head>

<body class="bg-gray-100 dark:bg-[#0f172a] transition-all duration-300">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- CONTENT --}}
    <main class="pt-24">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- DARK MODE SCRIPT --}}
    <script>
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        themeToggle?.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }
    </script>

</body>
</html>
