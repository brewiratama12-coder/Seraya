<!DOCTYPE html>
<html lang="en">

<head>
       
    <meta charset="UTF-8">
        <title>Sign Up</title>
       
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f5f5] flex justify-center">

        <div class="w-full max-w-md bg-white mt-10 py-10 px-6 rounded-xl shadow-sm">

                        <div class="flex justify-center mb-6">
                        <div class="w-10 h-10 bg-[#1e3a5f] rounded-full"></div>
                    </div>

                <h2 class="text-center text-xl font-semibold mb-6">Sign up</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- PENTING: TAMBAHAN FIELD VISUAL UNTUK USERNAME DAN NO_HP SESUAI ACTION CLASS ANDA --}}

                        <button type="button"
                class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-3 text-gray-600">
                                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5">
                                Continue with Google
                            </button>
            <button type="button"
                class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-3 text-gray-600">
                                <img src="https://www.svgrepo.com/show/448224/facebook.svg" class="w-5">
                                Continue with Facebook
                            </button>
            <button type="button"
                class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-6 text-gray-600">
                                <img src="https://www.svgrepo.com/show/511330/apple-173.svg" class="w-5">
                                Continue with Apple
                            </button>


                                    <div class="flex items-center my-6">
                                <div class="flex-1 h-px bg-gray-300"></div>
                                <span class="px-3 text-gray-500 text-sm">OR</span>
                                <div class="flex-1 h-px bg-gray-300"></div>
                            </div>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm">
                    <p class="font-semibold mb-1">Pendaftaran Gagal. Periksa data Anda:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-4">
                            <label for="username" class="block text-sm text-gray-600">Username</label>
                            <input id="username" type="text" name="username" value="{{ old('username') }}"              
                       
                     class="w-full border rounded-lg px-4 py-2 mt-1 focus:outline-none focus:ring focus:ring-gray-300 @error('username') border-red-500 @enderror"
                    required autofocus>
            </div>

                                    <div class="mb-4">
                <label for="nama_lengkap" class="block text-sm text-gray-600">Full Name</label>
                            <input id="nama_lengkap" type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"  
                                   
                     class="w-full border rounded-lg px-4 py-2 mt-1 focus:outline-none focus:ring focus:ring-gray-300 @error('nama_lengkap') border-red-500 @enderror"
                    required>
            </div>

                                    <div class="mb-4">
                <label for="email" class="block text-sm text-gray-600">Email address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"                  
                     class="w-full border rounded-lg px-4 py-2 mt-1 focus:outline-none focus:ring focus:ring-gray-300 @error('email') border-red-500 @enderror"
                    required>
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-sm text-gray-600">Phone Number</label>
                            <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}"                  
                     class="w-full border rounded-lg px-4 py-2 mt-1 focus:outline-none focus:ring focus:ring-gray-300 @error('no_hp') border-red-500 @enderror"
                    required>
            </div>


                                    <div class="mb-4">
                <label for="password" class="block text-sm text-gray-600">Password</label>
                                <div class="relative mt-1">
                                        <input id="password" type="password" name="password"                      
                         class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300 @error('password') border-red-500 @enderror"
                        required autocomplete="new-password">

                                        <button type="button" id="togglePassword"                        
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-500">
                                                Hide
                                            </button>
                                    </div>
            </div>

                                    <div class="mb-6">
                <label for="password_confirmation" class="block text-sm text-gray-600">Confirm Password</label>
                                <div class="relative mt-1">
                                        <input id="password2" type="password" name="password_confirmation"              
                               
                         class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300 @error('password') border-red-500 @enderror"
                        required autocomplete="new-password">

                                        <button type="button" id="togglePassword2"                        
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-500">
                                                Hide
                                            </button>
                                    </div>
            </div>

                                    <button type="submit" class="w-full py-3 rounded-full bg-[#1e3a5f] text-white font-medium 
                                            hover:bg-[#1a324d] transition">
                                Sign up
                            </button>
        </form>
                        <p class="text-center mt-6 text-gray-700 font-medium">Already have an account?</p>
               
                @if (Route::has('login'))
            <a href="{{ route('login') }}"            
                class="w-full border rounded-full py-3 mt-3 text-gray-700 hover:bg-gray-50 block text-center">
                                Log in
                            </a>
        @endif

           
    </div>

           
    <script>
        function togglePassword(id, toggleId) {
            const input = document.getElementById(id);
            const toggle = document.getElementById(toggleId);

            toggle.addEventListener('click', () => {
                const type = input.type === "password" ? "text" : "password";
                input.type = type;
                toggle.textContent = type === "password" ? "Hide" : "Show";
            });
        }

        togglePassword('password', 'togglePassword');
        togglePassword('password2', 'togglePassword2');
    </script>

</body>

</html>