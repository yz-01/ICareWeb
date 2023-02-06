<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class RegisterController extends Controller
{
    public function index()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required|string|max:255',
            'password' => [
                'required','string','confirmed',
                RulesPassword::min(6)
            ],
            
        ]);

        $users = User::where('name', $request->username)->get();
        if(empty($users)){
            
        }else{
            $user = User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        $request->session()->flash('success', trans('messages.create.success'));

        return redirect()->route('register.index');;
    }
}
