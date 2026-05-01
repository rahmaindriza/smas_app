<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    // Tambahkan string $role di akhir parameter fungsi
   public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek kecocokan level
        if (Auth::check() && Auth::user()->level === $role) {
            return $next($request);
        }

        // 2. Jika tidak cocok, hapus session/auth dulu di background
        if (Auth::check()) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        // 3. Baru tampilkan pesan error
        // User akan melihat halaman ini, tapi statusnya sudah 'Guest' (sudah logout)
        abort(403, 'Anda tidak memiliki akses ke halaman ini. Sesi login Anda telah dihentikan.');
    }
}
