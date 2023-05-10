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
        if ($request->is('doctor') || $request->is('doctor/*')) {
            return redirect()->guest(route('doctor.login'));
        }
        if ($request->is('nurse') || $request->is('nurse/*')) {
            return redirect()->guest(route('nurse.login'));
        }
        if ($request->is('patient') || $request->is('patient/*')) {
            return redirect()->guest(route('patient.login'));
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
