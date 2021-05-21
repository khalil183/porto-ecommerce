<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class EmailVerifiedController extends Controller
{
    public function verify($token){
        $isUser=User::where('verified_token',$token)->first();
        if($isUser){
            User::where('id',$isUser->id)->update([
                'status'=>1,
                'verified_token'=>null
            ]);

            $notification=array(
                'messege'=>'Email Verification Successfully. Please Login Here',
                'alert-type'=>'info'
            );
            return Redirect()->route('login')->with($notification);

        }else{
            $notification=array(
                'messege'=>'Verified Token Invalid',
                'alert-type'=>'error'
            );
            return Redirect()->route('home')->with($notification);
        }
    }
}
