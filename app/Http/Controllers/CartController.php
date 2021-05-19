<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents=Cart::content();
        return view('user.cart.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=Product::find($request->id);

        $data=array();
        $data['id']=$request->id;
        $data['name']=$product->name;
        $data['qty']=$request->qty;
        $data['price']=$product->price;
        $data['weight']=0; // it is mendetory
        $data['options']['image']=$product->image;

        Cart::add($data);

        $notification=array(
            'messege'=>'Product Added SuccessfullY',
            'alert-type'=>'info'
            );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach($request->rowId as $key=> $row){
            Cart::update($row,$request->qty[$key]);
        }
        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'info'
            );
        return Redirect()->back()->with($notification);
    }

    public function allDestroy(){
        Cart::destroy();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'info'
            );
        return Redirect()->back()->with($notification);
    }
}
