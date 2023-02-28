<?php

namespace App\Http\Controllers\CenterUser;

use App\Http\Controllers\Controller;
use App\Models\PromoteProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $promote_product = PromoteProduct::where('center_user_id', Auth::user()->id)->first();
        return view('center_user.dashboard', compact('promote_product'));
    }
}
