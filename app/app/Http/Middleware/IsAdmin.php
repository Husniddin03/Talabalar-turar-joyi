<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // <-- Muhim!
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next): Response
    {
        // foydalanuvchi login bo‘lgan va roli admin bo‘lsa
        if (session('role') === 'admin') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Sizda admin huquqi yo‘q!');
    }
}
