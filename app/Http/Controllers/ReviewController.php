<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;
use App\OrderProduct;
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function store(Request $reqeust,$productId){
        $this->validate($reqeust,[
            'review'=>'required',
            'rating'=>'required'
        ]);


        $isPurchase=OrderProduct::where(['user_id'=>Auth::user()->id,'product_id'=>$productId])->first();
         // check purchase product by login user
        if($isPurchase){
            // check order status
            if($isPurchase->order->status==1){
                $isReview=Review::where(['user_id'=>Auth::user()->id,'product_id'=>$productId])->first();
                // check available review in this product by login user
                if(!$isReview){
                    Review::create([
                        'user_id'=>Auth::user()->id,
                        'product_id'=>$productId,
                        'rating'=>$reqeust->rating,
                        'review'=>$reqeust->review
                    ]);
                    return Redirect()->back()->with(['reviewSuccess'=>'Thanks for your review!']);
                }else{
                    return Redirect()->back()->with(['reviewError'=>'Sorry!! you have already submited review']);
                }
            }else{
                return Redirect()->back()->with(['reviewError'=>'Sorry!! you can not submit review. Because you Did not purchase this product.']);
            }

        }else{
            return Redirect()->back()->with(['reviewError'=>'Sorry!! you can not submit review. Because you Did not purchase this product.']);
        }
    }
}
