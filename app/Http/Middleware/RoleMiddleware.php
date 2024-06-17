<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Jika pengguna tidak login, arahkan ke halaman beranda
        if (!Auth::check()) {
            return redirect('/');
        }

        // Jika pengguna login tetapi tidak memiliki peran yang sesuai, munculkan pesan "Unauthorized"
        if ($request->user()->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }

}
