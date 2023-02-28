<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'admin/login',
        'agent/login',
        'merchant/login',
        'center_user/login',
        'trainer/login',
        'company_user/login',
        'customer/login',
        'admin/logout',
        'agent/logout',
        'merchant/logout',
        'center_user/logout',
        'trainer/logout',
        'company_user/logout',
        'customer/logout',
    ];
}
