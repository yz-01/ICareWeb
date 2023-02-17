<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest(route('admin.login'));
        }
        if ($request->is('agent') || $request->is('agent/*')) {
            return redirect()->guest(route('agent.login'));
        }
        if ($request->is('merchant') || $request->is('merchant/*')) {
            return redirect()->guest(route('merchant.login'));
        }
        if ($request->is('teacher') || $request->is('teacher/*')) {
            return redirect()->guest(route('teacher.login'));
        }
        if ($request->is('customer') || $request->is('customer/*')) {
            return redirect()->guest(route('customer.login'));
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
