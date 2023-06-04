<?php

namespace App\Http\Middleware\CleaningAdmin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusCheck
{
    /**
     * Handle an incoming request.
     *
     * MIDDLEWARE INI DIGUNAKAN UNTUK CEK STATUS ADMIN SEBAGAI SARANA PEMBATASAN AKSES PERILAKU ADMIN
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->input('email');
        dd($email);
        return $next($request);
    }
}
