<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login
        if (auth()->check()) {
            // Asumsi: Anda memiliki kolom 'role' di tabel users
            if (auth()->user()->role === 'admin') {
                // Arahkan admin ke halaman admin/dashboard
                return redirect()->route('admin.dashboard');
            }
        }

        // Untuk user biasa atau yang belum login, lanjutkan request
        return $next($request);
    }
}