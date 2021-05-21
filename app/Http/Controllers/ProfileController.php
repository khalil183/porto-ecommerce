<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\Order;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index(){
        $user=Auth::user();
        return view('user.profile.index',compact('user'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'old_password'=>'required',
            'password'=>'confirmed'
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::where('id',Auth::user()->id)->update([
                'name'=>$request->name,
                'password'=>$request->password ? Hash::make($request->password) : Auth::user()->password,
            ]);

            $notification=array(
                'messege'=>'Information Updated Successfully',
                'alert-type'=>'info'
                 );

            return Redirect()->back()->with($notification);


         }else{
            $notification=array(
                'messege'=>'Old Password Deos not Match',
                'alert-type'=>'error'
                 );

            return Redirect()->back()->with($notification);
         }


    }

    public function order(){
        $orders=Order::where('user_id',Auth::user()->id)->get();
        return view('user.profile.order.index',compact('orders'));
    }

    public function orderShow($id){
        $order=Order::with('products','shipping','user')->find($id);
        return view('user.profile.order.show',compact('order'));
    }

}
