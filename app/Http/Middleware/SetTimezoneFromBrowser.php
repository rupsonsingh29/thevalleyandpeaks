<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetTimezoneFromBrowser
{
    public function handle(Request $request, Closure $next)
    {
        if ($tz = $request->cookie('timezone')) {
            session(['timezone' => $tz]);
        }

        return $next($request);
    }
}