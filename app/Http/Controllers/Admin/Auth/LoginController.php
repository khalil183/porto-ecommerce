<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }


    public function showAdminLoginForm(){
        return view('admin.auth.login');
    }

    public function storeLoginInfo(Request $request){

        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        $credential=[
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::guard('admin')->attempt($credential,$request->remember)){
            return Redirect()->intended(route('admin.dashboard'));
        }
        return Redirect()->back()->withInput($request->only('email,remember'));
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
