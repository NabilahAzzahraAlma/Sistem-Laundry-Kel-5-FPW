<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Memeriksa apakah pengguna sudah terautentikasi dan memiliki role yang sesuai
        // if (Auth::check() && Auth::user()->role !== $role) {
        //     return redirect('/dashboard');  // Redirect jika role tidak sesuai
        // }

        return $next($request);  // Lanjutkan jika role sesuai
    }
}
