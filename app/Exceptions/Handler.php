<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
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
        if ($request->is('center_user') || $request->is('center_user/*')) {
            return redirect()->guest(route('center_user.login'));
        }
        if ($request->is('trainer') || $request->is('trainer/*')) {
            return redirect()->guest(route('trainer.login'));
        }
        if ($request->is('company_user') || $request->is('company_user/*')) {
            return redirect()->guest(route('company_user.login'));
        }
        if ($request->is('customer') || $request->is('customer/*')) {
            return redirect()->guest(route('customer.login'));
        }
        return redirect()->guest(route('welcome'));
    }
}
