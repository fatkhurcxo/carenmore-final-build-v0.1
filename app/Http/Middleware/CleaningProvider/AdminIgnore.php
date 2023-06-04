<?php

namespace App\Http\Middleware\CleaningProvider;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminIgnore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Admin::firstWhere('user_id', Auth::id());

        if(empty($admin))
        {
            return $next($request);
        }

        return back()->with('fail', 'Anda tidak memiliki akses ke side provider');
    }
}
