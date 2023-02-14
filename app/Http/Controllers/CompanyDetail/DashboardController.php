<?php

namespace App\Http\Controllers\CompanyDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('company_detail.dashboard');
    }
}
