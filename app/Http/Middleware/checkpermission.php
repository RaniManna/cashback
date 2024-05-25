<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class checkpermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        /* if (Auth::user()->role==2 || Auth::user()->role==3 || Auth::user()->role==4 || Auth::user()->role==5 || Auth::user()->role==6) {
            if ($permission=='owner') {
                return back();

            }

            if ($permission=='admin' && (Auth::user()->role==3 || Auth::user()->role==4 || Auth::user()->role==5 || Auth::user()->role==6)) {
                return back();
            }

            if ($permission=='manager' && Auth::user()->role==3) {
                return back();
            }
        } */
        return $next($request);
    }
}
