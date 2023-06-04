<?php

namespace App\Http\Middleware\CleaningProvider;

use Closure;
use App\Models\Admin;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProviderCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $provider = Provider::firstWhere('user_id', Auth::id());
        if(empty($provider))
        {
            return redirect()->route('provider.new')->with('fail', 'Anda belum melakukan pengajuan sebagai penyedia jasa.');
        }
        return $next($request);
    }

}
