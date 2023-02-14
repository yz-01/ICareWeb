<?php

namespace App\Http\Controllers\CompanyDetail\Auth;

use App\Http\Controllers\Controller;
use App\Models\AgentCode;
use App\Models\Company;
use App\Models\CompanyDetail;
use App\Models\Country;
use App\Models\NatureBusiness;
use App\Models\PointTransaction;
use App\Models\PromoteProduct;
use App\Models\SecurityQuestion;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
    protected $redirectTo = '/company_detail/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company_detail');
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
            'company_name' => 'required|string|max:255',
            'company_registration_number' => 'required|string|max:255',
            'nature_business' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:company_details|min:10',
            'position' => 'required|string|max:255',
            'ssm_document' => 'nullable',
            'email' => 'required|string|email|max:255|unique:company_details',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country_id' => 'required',
            // 'agent_id' => 'nullable',
            'agent_code' => 'nullable',
            'is_own_company' => 'required',
            'member_number' => 'required',
            'is_hrdf' => 'required',
            'product1' => 'nullable|string|max:255',
            'product2' => 'nullable|string|max:255',
            'product3' => 'nullable|string|max:255',
            'product4' => 'nullable|string|max:255',
            'product5' => 'nullable|string|max:255',
            'security_question_id' => 'required',
            'security_answer' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => [
                'required','string','confirmed',
                Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
            ],
        ],[
            'nature_business.required' => 'The nature of business field is required.',
            'country_id.required' => 'The country field is required.',
            'is_own_company.required' => 'The own company field is required.',
            'member_number.required' => 'The member of number field is required.',
            'is_hrdf.required' => 'The HRDF field is required.',
            'security_question_id.required' => 'The security question field is required.',
        ]);

        $check_agent_code = AgentCode::where('phone', $request->agent_code)->where('is_use', 0)->first();

        if($check_agent_code || $request->agent_code == null)
        {
            if($check_agent_code)
            {
                $check_agent_code->update([
                    'is_use' => 1,
                ]);
            }

            $last_company_detail = CompanyDetail::withTrashed()->latest('id')->first();

            if($request->file('ssm_document'))
            {
                $ssm_document = $request->file('ssm_document');
                $fileName   = $ssm_document->getClientOriginalName(); 
                Storage::disk('public')->putFileAs('ssm_file', $ssm_document, $fileName);
                $file = "storage/ssm_file/". $ssm_document->getClientOriginalName();
            }
            

            $company_detail = CompanyDetail::create([
                'code' => $last_company_detail ? $last_company_detail->code : null,
                'name' => $request->name,
                'phone' => $request->phone,
                'position' => $request->position,
                'company_name' => $request->company_name,
                'company_registration_number' => $request->company_registration_number,
                'ssm_document' => $request->file('ssm_document') ? $file : null,
                'nature_business' => $request->nature_business,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country_id' => $request->country_id,
                'is_own_company' => $request->is_own_company,
                'member_number' => $request->member_number,
                'is_hrdf' => $request->is_hrdf,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'security_question_id' => $request->security_question_id,
                'security_answer' => $request->security_answer,
                'agent_code' => $request->agent_code,
                'is_approve' => 1,
                'point_balance' => 100,
            ]);

            $point_transaction = PointTransaction::create([
                'company_detail_id' => $company_detail->id,
                'in' => $company_detail->point_balance,
                'description' => 'New Member - Welcome Bonus',
            ]);


            if($check_agent_code)
            {
                $company_detail->update([
                    'point_balance' => $company_detail->point_balance+50,
                ]);
                $point_transaction->create([
                    'company_detail_id' => $company_detail->id,
                    'in' => 50,
                    'description' => 'New Member - Referral Bonus',
                ]);
            }

            $promote_product = PromoteProduct::create([
                'company_detail_id' => $company_detail->id,
                'product1' => $request->product1,
                'product2' => $request->product2,
                'product3' => $request->product3,
                'product4' => $request->product4,
                'product5' => $request->product5,
            ]);

            if($last_company_detail){
                $add_company_detail_code_number = substr($company_detail->code,-4) + 1;
                $company_detail->update([
                    'code' => "C".str_pad($add_company_detail_code_number, 4, '0', STR_PAD_LEFT),
                    'promote_product_id' => $promote_product->id,
                ]);
            }
            else{
                $company_detail->update([
                    'code' => "C".str_pad(1, 4, '0', STR_PAD_LEFT),
                    'promote_product_id' => $promote_product->id,
                ]);
            }

            AgentCode::create([
                'phone' => $company_detail->phone,
                'is_use' => 0,
            ]);
        }
        else
        {
            return redirect()->back()->withInput(request()->input())->withErrors(['error'=> 'The Referral Code is incorrect or have been use.']);
        }


        return redirect('/')->with('success', 'Thank you for submitting the form and welcome to our website! Please wait for Admin approval.');
    }

    public function showRegistrationForm()
    {
        $countries = Country::all();
        $nature_businesses = NatureBusiness::all();
        $security_questions = SecurityQuestion::all();
        return view('company_detail.auth.register', compact('countries', 'security_questions', 'nature_businesses'));
    }
}
