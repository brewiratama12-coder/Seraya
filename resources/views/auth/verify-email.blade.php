<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f5f5] flex justify-center p-6">

    <div class="w-full max-w-lg bg-white mt-10 py-10 px-6 rounded-xl shadow-sm border border-gray-200">
        
        <h2 class="text-center text-2xl font-bold text-[#1e3a5f] mb-4">Verifikasi Alamat Email Anda</h2>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm">
                Tautan verifikasi baru telah dikirimkan ke alamat email yang terdaftar.
            </div>
        @endif

        <p class="text-gray-600 mb-6">
            Terima kasih telah mendaftar! Sebelum melanjutkan, harap periksa *inbox* email Anda untuk tautan verifikasi. 
            Jika Anda tidak menerima email, klik tombol di bawah ini untuk mengirim ulang.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <button type="submit" 
                    class="w-full py-3 rounded-full bg-[#1e3a5f] text-white font-medium hover:bg-[#1a324d] transition">
                    Kirim Ulang Email Verifikasi
                </button>
            </div>
        </form>

        <hr class="my-6 border-gray-200">

        <p class="text-center text-sm text-gray-500">
            Ingin keluar dari sesi ini?
        </p>
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="w-full py-2 rounded-full border border-gray-300 text-gray-700 hover:bg-gray-50 transition">
                Logout
            </button>
        </form>

    </div>

</body>
</html>