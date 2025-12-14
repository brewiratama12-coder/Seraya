    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#f5f5f5] flex justify-center">

        <div class="w-full max-w-md bg-white mt-10 py-10 px-6 rounded-xl shadow-sm">
            
                    <div class="flex justify-center mb-6">
                <div class="w-10 h-10 bg-[#1e3a5f] rounded-full"></div>
            </div>

            <h2 class="text-center text-xl font-semibold mb-6">Log in</h2>

            {{-- TAMPILAN STATUS DAN ERROR --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm">
                    <span class="block sm:inline font-semibold">Gagal Login.</span> Periksa kembali email/username dan kata sandi Anda.
                </div>
            @endif
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm">
                    {{ session('status') }}
                </div>
            @endif
            {{-- END TAMPILAN STATUS DAN ERROR --}}


                    <button class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-3 text-gray-600">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5">
                Continue with Google
            </button>

            <button class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-3 text-gray-600">
                <img src="https://www.svgrepo.com/show/448224/facebook.svg" class="w-5">
                Continue with Facebook
            </button>

            <button class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-6 text-gray-600">
                <img src="https://www.svgrepo.com/show/511330/apple-173.svg" class="w-5">
                Continue with Apple
            </button>

                    <div class="flex items-center my-6">
                <div class="flex-1 h-px bg-gray-300"></div>
                <span class="px-3 text-gray-500 text-sm">OR</span>
                <div class="flex-1 h-px bg-gray-300"></div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                            <label for="email" class="text-sm text-gray-600">Email address or user name</label>
                <input id="email" 
                    type="email" 
                    name="email" {{-- PENTING: Atribut name Fortify --}}
                    value="{{ old('email') }}" {{-- PENTING: Mempertahankan input --}}
                       class="w-full border rounded-lg px-4 py-2 mt-1 mb-1 focus:outline-none focus:ring focus:ring-gray-300 @error('email') border-red-500 @enderror"
                    required autofocus>
                @error('email')
                    <p class="text-red-500 text-xs italic mb-4">{{ $message }}</p>
                @enderror

                            <label for="password" class="text-sm text-gray-600">Password</label>
                <div class="relative mt-1 mb-1">
                    <input id="password" 
                        type="password" 
                        name="password" {{-- PENTING: Atribut name Fortify --}}
                           class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300 @error('password') border-red-500 @enderror"
                        required autocomplete="current-password">

                    <button type="button" id="togglePassword"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-500">
                        Hide
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs italic mb-4">{{ $message }}</p>
                @enderror

                            <div class="flex justify-between items-center text-sm mb-6">
                    <label for="remember_me" class="flex items-center gap-2">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4"> {{-- PENTING: Atribut name Fortify --}}
                        Remember me
                    </label>

                    {{-- Link Forgot Password Fortify --}}
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-gray-500 hover:underline">Forgot your password</a>
                    @endif
                </div>

                            <button type="submit" class="w-full py-3 rounded-full bg-[#1e3a5f] text-white font-medium 
                                            hover:bg-[#1a324d] transition">
                    Log in
                </button>
            </form>

                    <p class="text-center mt-6 text-gray-700 font-medium">Don't have an account?</p>
            
            {{-- Link Register Fortify --}}
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="w-full border rounded-full py-3 mt-3 text-gray-700 hover:bg-gray-50 block text-center">
                    Sign Up
                </a>
            @endif

        </div>

            <script>
            const password = document.getElementById('password');
            const toggle = document.getElementById('togglePassword');

            toggle.addEventListener('click', () => {
                const type = password.type === "password" ? "text" : "password";
                password.type = type;

                toggle.textContent = type === "password" ? "Hide" : "Show";
            });
        </script>

    </body>
    </html>