<?php

namespace App\Http\Controllers\CompanyUser;

use App\Http\Controllers\Controller;
use App\Models\PromoteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $promote_product = PromoteProduct::where('merchant_id', Auth::user()->id)->first();
        return view('company_user.dashboard', compact('promote_product'));
    }
}
