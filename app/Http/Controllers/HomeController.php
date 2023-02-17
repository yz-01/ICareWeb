<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function tnc()
    {
        return view('tnc');
    }

    public function reward_tnc()
    {
        return view('reward_tnc');
    }
}
