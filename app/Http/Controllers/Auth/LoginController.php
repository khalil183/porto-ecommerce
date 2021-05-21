<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
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
        $this->middleware('guest:web')->except('logout');
    }

    public function userLoginFrom(){
        return view('auth.login');
    }

    public function userLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $credential=[
            'email'=> $request->email,
            'password'=> $request->password
        ];

        $user=User::where('email',$request->email)->first();
        if($user){
            if($user->status==1){
                if(Auth::guard('web')->attempt($credential,$request->remember)){
                    return Redirect()->intended(route('home'));
                }
            }else return Redirect()->back()->with(['invalidUser'=>'User In-Activate,Please Active user']);
        }else return Redirect()->back()->with(['invalidUser'=>'User Not Found']);


        if(Auth::guard('admin')->attempt($credential,$request->remember)){
            return Redirect()->intended(route('admin.dashboard'));
        }
        return Redirect()->back()->withInput($request->only('email,remember'));
    }



    public function logout(){
        Auth::guard('web')->logout();
        return Redirect()->route('login');
    }
}
