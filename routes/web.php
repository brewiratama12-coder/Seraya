<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaketController;

Route::get('/', function () {
    return view('welcome'); 
})->name('home');

Route::middleware(['auth'])->group(function () {

    // Grup Rute yang HANYA dapat diakses setelah LOGIN dan EMAIL TERVERIFIKASI (Middleware 'verified')
    Route::middleware(['verified'])->group(function () {

        // Admin Dashboard - hanya untuk admin
        Route::get('/home', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(\App\Http\Middleware\IsAdmin::class);

        // Paket Wisata - admin listing and edit
        Route::get('/admin/paket', [PaketController::class, 'index'])->name('admin.paket.index')->middleware(\App\Http\Middleware\IsAdmin::class);
        Route::get('/admin/paket/{id}/edit', [PaketController::class, 'edit'])->name('admin.paket.edit')->middleware(\App\Http\Middleware\IsAdmin::class);
        Route::patch('/admin/paket/{id}', [PaketController::class, 'update'])->name('admin.paket.update')->middleware(\App\Http\Middleware\IsAdmin::class);
        
        // Admin: pesanan page
        Route::get('/admin/pesanan', [DashboardController::class, 'pesanan'])
            ->name('admin.pesanan')
            ->middleware(\App\Http\Middleware\IsAdmin::class);
        
        // Halaman verifikasi pembayaran dihapus; verifikasi dilakukan dari pesanan

        // Admin: permintaan status update
        Route::patch('/admin/permintaan/{id}/status', [\App\Http\Controllers\PermintaanController::class, 'updateStatus'])
            ->name('admin.permintaan.updateStatus')
            ->middleware(\App\Http\Middleware\IsAdmin::class);

    });
});

Route::get('/paket-wisata', function () {
    return view('paket_wisata');
})->name('paket_wisata');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('register', function (){
    return view('auth.register');
})->name('register');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/hubungi_kami', function () {
    return view('hubungi_kami');
})->name('hubungi_kami');

Route::get('/welcone', function () {
    return view('welcome');
})->name('beranda');


Route::get('/main', function () {
    return view('welcome');
})->name('main');

Route::get('/partials', function () {
    return view('navbar');
})->name('main');

Route::get('/detail_private', function () {
    return view('detail_private');
})->name('detail_private');

// Old `/admin` view route removed — using new admin layout and routes instead.

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:web');

Route::get('/producst', function () {
    return view('producst');
})->name('producst');

Route::get('/pembayaran_wedding', function () {
    return view('pembayaran_wedding');
})->name('pembayaran_wedding');

Route::get('/producst', function () {
    return view('producst');
})->name('producst');

Route::get('/detail_wedding', function () {
    return view('detail_wedding');
})->name('detail_wedding');

Route::get('/detail_private', function () {
    return view('detail_private');
})->name('detail_private');

Route::get('/detail_open', function () {
    return view('detail_open');
})->name('detail_open');

Route::get('/pembayaran_private', function () {
    return view('pembayaran_private');
})->name('pembayaran_private');

Route::get('/pembayaran_open', function () {
    return view('pembayaran_open');
})->name('pembayaran_open');

// Booking routes - require authentication
Route::middleware(['auth'])->group(function () {
    Route::post('/booking/upload-proof', [BookingController::class, 'uploadProof'])->name('booking.uploadProof');
    Route::post('/booking/confirm', [BookingController::class, 'confirmPayment'])->name('booking.confirmPayment');

    // Optional: provide a page to start booking
    Route::get('/booking', function () {
        return view('booking');
    })->name('booking');
});
