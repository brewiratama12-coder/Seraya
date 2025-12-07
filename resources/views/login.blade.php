<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f5f5] flex justify-center">

    <div class="w-full max-w-md bg-white mt-10 py-10 px-6 rounded-xl shadow-sm">
        
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="w-10 h-10 bg-[#1e3a5f] rounded-full"></div>
        </div>

        <h2 class="text-center text-xl font-semibold mb-6">Log in</h2>

        <!-- Social Login Buttons -->
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

        <!-- Email Input -->
        <label class="text-sm text-gray-600">Email address or user name</label>
        <input type="email" 
               class="w-full border rounded-lg px-4 py-2 mt-1 mb-4 focus:outline-none focus:ring focus:ring-gray-300">

        <!-- Password Input -->
        <label class="text-sm text-gray-600">Password</label>
        <div class="relative mt-1 mb-4">
            <input id="password" type="password" 
                   class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring focus:ring-gray-300">

            <button type="button" id="togglePassword"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-500">
                Hide
            </button>
        </div>

        <!-- Remember + Forgot -->
        <div class="flex justify-between items-center text-sm mb-6">
            <label class="flex items-center gap-2">
                <input type="checkbox" class="w-4 h-4">
                Remember me
            </label>

            <a href="#" class="text-gray-500 hover:underline">Forgot your password</a>
        </div>

        <!-- Login Button -->
        <button class="w-full py-3 rounded-full bg-gray-300 text-white font-medium 
                       hover:bg-gray-400 transition">
            Log in
        </button>

        <!-- Sign Up -->
        <p class="text-center mt-6 text-gray-700 font-medium">Don't have an account?</p>
        
        <button class="w-full border rounded-full py-3 mt-3 text-gray-700 hover:bg-gray-50">
            Sign up
        </button>

    </div>

    <!-- Password Toggle Script -->
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
