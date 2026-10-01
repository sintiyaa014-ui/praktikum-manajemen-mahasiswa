<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if ($request->user() && $request->user()->role !== $role) {
            abort(403, 'AKSES DITOLAK. ANDA TIDAK MEMILIKI HAK AKSES KE HALAMAN INI.');
        }

        return $next($request);
    }
}