<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login dan memiliki peran admin
        if (Auth::check() && Auth::user()->rolw === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman lain atau tampilkan pesan error
        return redirect('/');
    }
}
