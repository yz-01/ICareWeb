<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
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
    protected $redirectTo = '/customer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
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
            'identity_card' => 'required|string|max:255|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country_id' => 'required',
            // 'agent_id' => 'nullable',
            'agent_code' => 'nullable',
            'security_question_id' => 'required',
            'security_answer' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => [
                'required','string','confirmed',
                Password::min(8)
            ],
        ],[
            'country_id.required' => 'The country field is required.',
            'security_question_id.required' => 'The security question field is required.',
        ]);

        $last_customer = Customer::withTrashed()->latest('id')->first();

        $customer = Customer::create([
            'code' => $last_customer ? $last_customer->code : null,
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
            'agent_code' => $request->agent_code,
            'is_approve' => 0,
        ]);

        if($last_customer){
            $add_customer_code_number = substr($customer->code,-4) + 1;
            $customer->update([
                'code' => "C".str_pad($add_customer_code_number, 4, '0', STR_PAD_LEFT),
            ]);
        }
        else{
            $customer->update([
                'code' => "C".str_pad(1, 4, '0', STR_PAD_LEFT),
            ]);
        }

        return redirect('/')->with('success', 'Thank you for submitting the form and welcome to our website! Please wait for Admin approval.');
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        $security_questions = SecurityQuestion::all();
        return view('customer.auth.register', compact('countries', 'security_questions'));
    }
}
