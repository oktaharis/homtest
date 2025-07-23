<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;

                switch ($role) {
                    case 'admin':
                        return redirect()->route('master.users.index');
                    case 'petugas':
                        return redirect()->route('transaksi.kunjungan.index');
                    case 'dokter':
                        return redirect()->route('transaksi.kunjungan.index');
                    case 'kasir':
                        return redirect()->route('pembayaran.index');
                    default:
                        return redirect('/dashboard');
                }
            }
        }

        return $next($request);
    }
}
