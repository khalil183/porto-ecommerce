<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;
class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists=Wishlist::where('user_id',Auth::user()->id)->get();
        return view('user.profile.wishlist.index',compact('wishlists'));
    }


    public function store($id)
    {
        $isWislist=Wishlist::where(['user_id'=>Auth::user()->id,'product_id'=>$id
        ])->first();
        if(!$isWislist){
            Wishlist::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$id
            ]);

            $notification=array(
                'messege'=>'Wishlist Addedd Successfully',
                'alert-type'=>'info'
                 );

            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Oppsss!! Already Added',
                'alert-type'=>'error'
                 );

            return Redirect()->back()->with($notification);
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wishlist::destroy($id);
        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'info'
             );

        return Redirect()->back()->with($notification);

    }
}
