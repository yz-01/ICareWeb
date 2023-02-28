<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Http\Controllers\Controller;
use App\Models\CenterUser;
use App\Models\CompanyUser;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\NatureBusiness;
use App\Models\PointTransaction;
use App\Models\PromoteProduct;
use App\Models\SecurityQuestion;
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
            'company_name' => 'required|string|max:255',
            'company_registration_number' => 'required|string|max:255',
            'nature_business_id' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:merchants',
            'position' => 'required|string|max:255',
            'ssm_document' => 'nullable',
            'email' => 'required|string|email|max:255|unique:merchants',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country_id' => 'required',
            'referral_code' => 'nullable',
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
            'nature_business_id.required' => 'The nature of business field is required.',
            'country_id.required' => 'The country field is required.',
            'is_own_company.required' => 'The own company field is required.',
            'member_number.required' => 'The member of number field is required.',
            'is_hrdf.required' => 'The HRDF field is required.',
            'security_question_id.required' => 'The security question field is required.',
        ]);

        $check_merchant_referral_code = Merchant::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_center_referral_code = CenterUser::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_company_referral_code = CompanyUser::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();
        $check_customer_referral_code = Customer::where('own_referral_code', $request->referral_code)->where('is_referral_code_use', 1)->first();

        if($check_merchant_referral_code || $check_center_referral_code || $check_company_referral_code || $check_customer_referral_code || $request->referral_code == null)
        {
            if($check_merchant_referral_code)
            {
                $check_merchant_referral_code->update([
                    'is_referral_code_use' => 2,  //2=yes
                ]);
            }
            if($check_center_referral_code)
            {
                $check_center_referral_code->update([
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

            $last_merchant = Merchant::withTrashed()->latest('id')->first();
            
            if($request->file('ssm_document'))
            {
                $ssm_document = $request->file('ssm_document');
                $fileName   = $ssm_document->getClientOriginalName(); 
                Storage::disk('public')->putFileAs('ssm_file', $ssm_document, $fileName);
                $file = "storage/ssm_file/". $ssm_document->getClientOriginalName();
            }

            $merchant = Merchant::create([
                'code' => $last_merchant ? $last_merchant->code : null,
                'name' => $request->name,
                'phone' => $request->phone,
                'position' => $request->position,
                'company_name' => $request->company_name,
                'company_registration_number' => $request->company_registration_number,
                'ssm_document' => $request->file('ssm_document') ? $file : null,
                'nature_business_id' => $request->nature_business_id,
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
                'own_referral_code' => 'M'.$request->phone,
                'is_referral_code_use' => 1, //1=no
                'is_approve' => 2, //2=yes
                'point_balance' => 100,
            ]);

            $point_transaction = PointTransaction::create([
                'merchant_id' => $merchant->id,
                'in' => $merchant->point_balance,
                'description' => 'New Member - Welcome Bonus',
            ]);

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

            $promote_product = PromoteProduct::create([
                'merchant_id' => $merchant->id,
                'product1' => $request->product1,
                'product2' => $request->product2,
                'product3' => $request->product3,
                'product4' => $request->product4,
                'product5' => $request->product5,
            ]);

            if($last_merchant){
                $add_merchant_code_number = substr($merchant->code,-4) + 1;
                $merchant->update([
                    'code' => "M".str_pad($add_merchant_code_number, 4, '0', STR_PAD_LEFT),
                    'promote_product_id' => $promote_product->id,
                ]);
            }
            else{
                $merchant->update([
                    'code' => "M".str_pad(1, 4, '0', STR_PAD_LEFT),
                    'promote_product_id' => $promote_product->id,
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
        $nature_businesses = NatureBusiness::all();
        $security_questions = SecurityQuestion::all();
        return view('merchant.auth.register', compact('countries', 'security_questions', 'nature_businesses'));
    }
}
