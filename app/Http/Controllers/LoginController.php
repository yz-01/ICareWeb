<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('users.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => [
                'required'
            ],
        ]);

        $user = User::where('name',$request->username)->where('password',Hash::make($request->password))->get();

        if(empty($user)){

        }
        else{
            return redirect()->route('profile.index');
            // dd(123);
        }
    }
}
