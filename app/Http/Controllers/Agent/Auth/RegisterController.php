<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\CenterUser;
use App\Models\CompanyUser;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\PointTransaction;
use App\Models\SecurityQuestion;
use App\Models\Trainer;
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
    protected $redirectTo = '/agent/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:agent');
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
            'identity_card' => 'required|string|max:255|unique:agents',
            'email' => 'required|string|email|max:255|unique:agents',
            'phone' => 'required|numeric|unique:agents',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country_id' => 'required',
            'employment_status' => 'required',
            'company_name' => 'required_if:employment_status,1,2',
            'position' => 'required_if:employment_status,1,2',
            'referral_code' => 'nullable',
            'security_question_id' => 'required',
            'security_answer' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:agents',
            'password' => [
                'required','string','confirmed',
                Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
            ],
        ],[
            'country_id.required' => 'The country field is required.',
            'security_question_id.required' => 'The security question field is required.',
            'referral_code.required' => 'Your Referral Code is not correct or have been use.',
            'company_name.required_if' => 'The company name field is required when employment status is employee/employer.',
            'position.required_if' => 'The position field is required when employment status is employee/employer.',
        ]);

        $check_agent_referral_code = Agent::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_merchant_referral_code = Merchant::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_center_referral_code = CenterUser::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_trainer_referral_code = Trainer::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_company_referral_code = CompanyUser::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_customer_referral_code = Customer::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();

        if($check_agent_referral_code || $check_merchant_referral_code || $check_center_referral_code || $check_trainer_referral_code || $check_company_referral_code || $check_customer_referral_code || $request->referral_code == null)
        {
            if($check_agent_referral_code)
            {
                $check_agent_referral_code->update([
                    'is_referral_code_use' => 2,  //2=yes
                ]);
            }
            if($check_merchant_referral_code)
            {
                $check_merchant_referral_code->update([
                    'is_referral_code_use' => 2,
                ]);
            }
            if($check_center_referral_code)
            {
                $check_center_referral_code->update([
                    'is_referral_code_use' => 2,
                ]);
            }
            if($check_trainer_referral_code)
            {
                $check_trainer_referral_code->update([
                    'is_referral_code_use' => 2,
                ]);
            }
            if($check_company_referral_code)
            {
                $check_company_referral_code->update([
                    'is_referral_code_use' => 2,
                ]);
            }
            if($check_customer_referral_code)
            {
                $check_customer_referral_code->update([
                    'is_referral_code_use' => 2, 
                ]);
            }

            $last_agent = Agent::withTrashed()->latest('id')->first();

            $agent = Agent::create([
                'code' => $last_agent ? $last_agent->code : null,
                'name' => $request->name,
                'identity_card' => $request->identity_card,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country_id' => $request->country_id,
                'employment_status' => $request->employment_status,
                'company_name' => ($request->employment_status == 1 || $request->employment_status == 2) ? $request->company_name : null,
                'position' => ($request->employment_status == 1 || $request->employment_status == 2) ? $request->position : null,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'security_question_id' => $request->security_question_id,
                'security_answer' => $request->security_answer,
                'own_referral_code' => 'P'.$request->phone,
                'is_referral_code_use' => 1, //1=no
                'is_approve' => 2, //2=yes
                'point_balance' => 100,
            ]);

            $point_transaction = PointTransaction::create([
                'agent_id' => $agent->id,
                'in' => $agent->point_balance,
                'description' => 'New Member - Welcome Bonus',
            ]);

            if($check_agent_referral_code)
            {
                $check_agent_referral_code->update([
                    'point_balance' => $check_agent_referral_code->point_balance+50,
                ]);
                $point_transaction->create([
                    'agent_id' => $check_agent_referral_code->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }
            if($check_merchant_referral_code)
            {
                $check_merchant_referral_code->update([
                    'point_balance' => $check_merchant_referral_code->point_balance+50,
                ]);
                $point_transaction->create([
                    'merchant_id' => $check_merchant_referral_code->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }
            if($check_center_referral_code)
            {
                $check_center_referral_code->update([
                    'point_balance' => $check_center_referral_code->point_balance+50,
                ]);
                $point_transaction->create([
                    'center_user_id' => $check_center_referral_code->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }
            if($check_trainer_referral_code)
            {
                $check_trainer_referral_code->update([
                    'point_balance' => $check_trainer_referral_code->point_balance+50,
                ]);
                $point_transaction->create([
                    'trainer_id' => $check_trainer_referral_code->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }
            if($check_company_referral_code)
            {
                $check_company_referral_code->update([
                    'point_balance' => $check_company_referral_code->point_balance+50,
                ]);
                $point_transaction->create([
                    'company_user_id' => $check_company_referral_code->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }
            if($check_customer_referral_code)
            {
                $check_customer_referral_code->update([
                    'point_balance' => $check_customer_referral_code->point_balance+50,
                ]);
                $point_transaction->create([
                    'customer_id' => $check_customer_referral_code->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }

            if($last_agent){
                $add_agent_code_number = substr($agent->code,-4) + 1;
                $agent->update([
                    'code' => "P".str_pad($add_agent_code_number, 4, '0', STR_PAD_LEFT),
                ]);
            }
            else{
                $agent->update([
                    'code' => "P".str_pad(1, 4, '0', STR_PAD_LEFT),
                ]);
            }

        }
        else
        {
            return redirect()->back()->withInput(request()->input())->withErrors(['error'=> 'The Referral Code is incorrect or have been use.']);
        }

        return redirect('/')->with('success', 'Thank you for submitting the form and welcome to our website!');
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        $security_questions = SecurityQuestion::all();
        return view('agent.auth.register', compact('countries', 'security_questions'));
    }
}
