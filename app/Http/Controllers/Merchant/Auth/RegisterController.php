<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Merchant;
use App\Models\SecurityQuestion;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/merchant/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:merchant');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'identity_card' => 'nullable|string|max:255|unique:merchants',
            'email' => 'required|string|email|max:255|unique:merchants',
            'phone' => 'nullable|numeric',
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'postal_code' => 'nullable',
            'country_id' => 'nullable',
            'agent_id' => 'nullable',
            'security_question_id' => 'required',
            'security_answer' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => [
                'required','string','confirmed',
                Password::min(8)
            ],
        ]);

        $last_merchant = Merchant::withTrashed()->latest('id')->first();
        
        $merchant = Merchant::create([
            'code' => $last_merchant ? $last_merchant->code : null,
            'name' => $request->name,
            'identity_card' => $request->identity_card,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country_id' => $request->country_id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'security_question_id' => $request->security_question_id,
            'security_answer' => $request->security_answer,
            'agent_id' => $request->agent_id,
        ]);

        if($last_merchant){
            $add_merchant_code_number = substr($merchant->code,-4) + 1;
            $merchant->update([
                'code' => "C".str_pad($add_merchant_code_number, 4, '0', STR_PAD_LEFT),
            ]);
        }
        else{
            $merchant->update([
                'code' => "C".str_pad(1, 4, '0', STR_PAD_LEFT),
            ]);
        }

        return redirect()->route('merchant.login');
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        $security_questions = SecurityQuestion::all();
        return view('merchant.auth.register', compact('countries', 'security_questions'));
    }
}
