<nav class="fixed top-0 left-0 w-full z-50 bg-[#213555] /40 backdrop-blur-md 
            text-white border-b border-white/10">

    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- LOGO --}}
        <a href="{{ route('main') }}" class="flex items-center gap-2">
            <img src="{{ asset('image/logo..png') }}" class="h-14 scale-150 object-contain">
            <h1 class="text-white text-2xl tracking-[0.2em] font-semibold">SERAYA</h1>
        </a>

        {{-- NAV LINKS --}}
        <div class="hidden md:flex items-center gap-10 text-white font-light tracking-widest text-sm">
            <a href="{{ route('main') }}" class="hover:text-gray-300">BERANDA</a>
            <a href="{{ route('paket_wisata') }}" class="hover:text-gray-300">PAKET WISATA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-300">GALERI</a>
            <a href="{{ route('hubungi_kami') }}" class="hover:text-gray-300">HUBUNGI KAMI</a>
        </div>

        {{-- BUTTONS --}}
        <div class="flex items-center gap-4">

            {{-- Toggle Dark Mode --}}
            <button id="themeToggle"
                class="px-3 py-1 bg-white dark:bg-[#2b3a48] dark:text-white rounded-full text-sm shadow transition">
                🌙 / ☀️
            </button>

            {{-- SIGN IN --}}
            <a href="{{ route('signin') }}"
                class="text-white hover:text-gray-300 text-sm">
                SIGN IN
            </a>

            {{-- LOGIN --}}
            <a href="{{ route('login') }}"
                class="bg-white text-gray-800 px-4 py-1 rounded-full text-sm shadow">
                Log in
            </a>

        </div>

    </div>
</nav>
