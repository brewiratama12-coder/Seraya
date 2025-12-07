<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f5f5] flex justify-center">

    <div class="w-full max-w-md bg-white mt-10 py-10 px-6 rounded-xl shadow-sm">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="w-10 h-10 bg-[#1e3a5f] rounded-full"></div>
        </div>

        <h2 class="text-center text-xl font-semibold mb-6">Sign up</h2>

        <!-- Social Buttons -->
        <button class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-3 text-gray-600">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5">
            Continue with Google
        </button>

        <button class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-3 text-gray-600">
            <img src="https://www.svgrepo.com/show/448224/facebook.svg" class="w-5">
            Continue with Facebook
        </button>

        <button class="w-full border rounded-full py-3 flex items-center justify-center gap-2 mb-6 text-gray-600">
            <img src="https://www.svgrepo.com/show/452210/apple-black.svg" class="w-5">
            Continue with Apple
        </button>

        <!-- OR Divider -->
        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gray-300"></div>
            <span class="px-3 text-gray-500 text-sm">OR</span>
            <div class="flex-1 h-px bg-gray-300"></div>
        </div>

        <!-- Name -->
        <label class="text-sm text-gray-600">Full Name</label>
        <input type="text" 
               class="w-full border rounded-lg px-4 py-2 mt-1 mb-4 focus:outline-none focus:ring focus:ring-gray-300">

        <!-- Email -->
        <label class="text-sm text-gray-600">Email address</label>
        <input type="email" 
               class="w-full border rounded-lg px-4 py-2 mt-1 mb-4 focus:outline-none focus:ring focus:ring-gray-300">

        <!-- Password -->
        <label class="text-sm text-gray-600">Password</label>
        <div class="relative mt-1 mb-4">
            <input id="password" type="password"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300">

            <button type="button" id="togglePassword"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-500">
                Hide
            </button>
        </div>

        <!-- Confirm Password -->
        <label class="text-sm text-gray-600">Confirm Password</label>
        <div class="relative mt-1 mb-6">
            <input id="password2" type="password"
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300">

            <button type="button" id="togglePassword2"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-500">
                Hide
            </button>
        </div>

        <!-- Sign Up Button -->
        <button class="w-full py-3 rounded-full bg-gray-300 text-white font-medium 
                       hover:bg-gray-400 transition">
            Sign up
        </button>

        <!-- Already have account -->
        <p class="text-center mt-6 text-gray-700 font-medium">Already have an account?</p>
        
        <a href="/login"
           class="w-full border rounded-full py-3 mt-3 text-gray-700 hover:bg-gray-50 block text-center">
            Log in
        </a>

    </div>

    <!-- Toggle Password JS -->
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
