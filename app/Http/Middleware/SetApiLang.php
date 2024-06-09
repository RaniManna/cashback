<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class EncryptCookies.
 */
class SetApiLang
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->header("lang", $request->query("lang", "en")));

        return $next($request);
    }
}
