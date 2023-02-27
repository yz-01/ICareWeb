<?php

namespace App\Http\Controllers\CompanyDetail\Auth;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('company_detail.auth.passwords.email');
    }

    public function forgot(Request $request)
    {
        $this->validateUserEmail($request);

        $user = CompanyDetail::where('email', $request->email)->first();

        if($user == null){
            return back()->withInput(request()->input())->withErrors(['email'=> 'We cannot find a user with that email']);
        }
        
        if($user->status == 0)
        {
            return back()->withInput(request()->input())->withErrors(['email'=> 'Your account has been suspended.']);
        }

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = Password::broker('company_details')->sendResetLink(['email'=>$user->email]);
        // dd($response);
        // dd(123);
        if($response == 'passwords.sent')
        {
            $success = 'Your password has been sent to your email. Thanks!';
            $request->session()->flash('success', $success);
            return $this->sendResetLinkResponse($request, $response);
        }
        else
        {
            $success = 'Email not found. Kindly contact our customer support for further assistance. Thanks!';
            $request->session()->flash('error', $success);
            return $this->sendResetLinkFailedResponse($request, $response);
        }
    }

    protected function validateUserEmail(Request $request)
    {
        $request->validate(['email' => 'required']);
    }

    public function broker()
    {
        return Password::broker('company_details');
    }
}
