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
        'company_detail/login',
        'teacher/login',
        'customer/login',
        'admin/logout',
        'agent/logout',
        'merchant/logout',
        'company_detail/logout',
        'teacher/logout',
        'customer/logout',
    ];
}
