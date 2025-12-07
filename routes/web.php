<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paket-wisata', function () {
    return view('paket_wisata');
})->name('paket_wisata');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/signin', function () {
    return view('signin');
})->name('signin');

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

Route::get('/detail_produk', function () {
    return view('detail_produk');
})->name('detail_produk');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/producst', function () {
    return view('producst');
})->name('producst');