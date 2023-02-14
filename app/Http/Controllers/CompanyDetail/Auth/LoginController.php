<?php

namespace App\Http\Controllers\CompanyDetail\Auth;

use App\Http\Controllers\Controller;
use App\Models\company_detail;
use App\Models\CompanyDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company_detail')->except('logout');
    }

    public function showLoginForm()
    {
        return view('company_detail.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);
        
        if(CompanyDetail::where('username',$request->username)->exists() && CompanyDetail::where('username',$request->username)->first()->status == 0){
            return redirect()->back()->withErrors(['username' => 'This account is not active']);
        }

        if(CompanyDetail::where('username',$request->username)->exists() && CompanyDetail::where('username',$request->username)->first()->is_approve == 0){
            return redirect()->back()->withErrors(['username' => 'This account is not approve']);
        }
        
        if (Auth::guard('company_detail')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->route('company_detail.dashboard');
        }
        dd('456');
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('company_detail')->logout();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('company_detail.login'));
    }
}
