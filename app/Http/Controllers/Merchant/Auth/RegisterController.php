<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Merchant;
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
            'nature_business' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'ssm_document' => 'required',
            'email' => 'required|string|email|max:255|unique:merchants',
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
            ],
        ]);

        $last_merchant = Merchant::withTrashed()->latest('id')->first();

        $ssm_document = $request->file('ssm_document');
        $fileName   = $ssm_document->getClientOriginalName(); 
        Storage::disk('public')->putFileAs('ssm_file', $ssm_document, $fileName);
        $file = "storage/ssm_file/". $ssm_document->getClientOriginalName();

        $merchant = Merchant::create([
            'code' => $last_merchant ? $last_merchant->code : null,
            'name' => $request->name,
            'position' => $request->position,
            'company_name' => $request->company_name,
            'company_registration_number' => $request->company_registration_number,
            'ssm_document' => $file,
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
            'is_approve' => 0,
        ]);

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
                'code' => "C".str_pad($add_merchant_code_number, 4, '0', STR_PAD_LEFT),
                'promote_product_id' => $promote_product->id,
            ]);
        }
        else{
            $merchant->update([
                'code' => "C".str_pad(1, 4, '0', STR_PAD_LEFT),
                'promote_product_id' => $promote_product->id,
            ]);
        }


        return redirect('/')->with('success', 'Thank you for submitting the form and welcome to our website! Please wait for Admin approval.');
    }

    public function showRegistrationForm()
    {
        $merchant = Merchant::where('code', 'C0002')->first();
        // dd($merchant);
        $countries = Country::all();
        $security_questions = SecurityQuestion::all();
        return view('merchant.auth.register', compact('countries', 'security_questions', 'merchant'));
    }
}
