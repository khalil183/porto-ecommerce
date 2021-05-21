<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return view('admin.order.index',compact('orders'));
    }
    public function show($id){
        $order=Order::with('products','shipping','user')->find($id);
        return view('admin.order.show',compact('order'));
    }

    public function orderAccept($id){
        Order::where('id',$id)->update([
            'status'=>1
        ]);
        $notification=array(
            'messege'=>'Order Accepted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

    public function orderCancel($id){
        Order::where('id',$id)->update([
            'status'=>0
        ]);
        $notification=array(
            'messege'=>'Order Canceld Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }


}
