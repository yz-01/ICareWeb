<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = Customer::where('id', auth()->user()->id)->first();

        return view('customer.dashboard', compact('customer'));
    }
}
