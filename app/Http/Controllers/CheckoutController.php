<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use App\Shipping;
use Auth;
use Cart;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(){
        return view('user.checkout.index');
    }

    public function store(Request $request){
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'zip_code'=>'required',
        ]);

        // check cart quantity
        if(Cart::count()>0){
            // insert Shipping info
            $shipping=Shipping::create([
                'name'=>$request->first_name.' '.$request->last_name,
                'phone'=>$request->phone,
                'city'=>$request->city,
                'zip_code'=>$request->zip_code,
            ]);
            if($shipping){
                // insert order info
                $order=Order::create([
                    'user_id'=>Auth::user()->id,
                    'shipping_id'=>$shipping->id,
                    'qty'=>Cart::count(),
                    'date'=>date('Y-m-d'),
                    'amount'=>str_replace( array( '\'', '"', ',' , ';', '<', '>' ), '', Cart::priceTotal())
                ]);

                if($order){
                    // insert order details info
                    foreach(Cart::content() as $row){
                        $success=OrderProduct::create([
                            'order_id'=>$order->id,
                            'user_id'=>Auth::user()->id,
                            'product_id'=>$row->id,
                            'name'=>$row->name,
                            'price'=>$row->price,
                            'qty'=>$row->qty,
                            'image'=>$row->options->image,
                        ]);
                    }
                    if($success){
                        $notification=array(
                            'messege'=>'Hurrah!! Your order is completed.',
                            'alert-type'=>'info'
                        );
                        Cart::destroy();
                        return Redirect()->route('home')->with($notification);
                    }else return $this->error();
                }else return $this->error();

            }else return $this->error();
        }else return $this->error();

    }

    public function error(){
        $notification=array(
            'messege'=>'Oppsss!! Something Went Wrong.',
            'alert-type'=>'error'
             );

        return Redirect()->back()->with($notification);
    }
}
