<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/admin/dashboard');
            }
            if ($guard == "agent" && Auth::guard($guard)->check()) {
                return redirect('/agent/dashboard');
            }
            if ($guard == "merchant" && Auth::guard($guard)->check()) {
                return redirect('/merchant/dashboard');
            }
            if ($guard == "center_user" && Auth::guard($guard)->check()) {
                return redirect('/center_user/dashboard');
            }
            if ($guard == "trainer" && Auth::guard($guard)->check()) {
                return redirect('/trainer/dashboard');
            }
            if ($guard == "company_user" && Auth::guard($guard)->check()) {
                return redirect('/company_user/dashboard');
            }
            if ($guard == "customer" && Auth::guard($guard)->check()) {
                return redirect('/customer/dashboard');
            }
        }

        return $next($request);
    }
}
