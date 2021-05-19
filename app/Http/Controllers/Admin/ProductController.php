<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Str;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with('category')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'image'=>'required',
        ]);

        $image=$request->file('image');
        if($image){
            $ext=$image->getClientOriginalExtension();
            $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $path='uploads/product/';
            $upload_path=$path.$name;
            Image::make($image)
                    ->resize(168,168)
                    ->save($upload_path);
            Product::create([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'price'=>$request->price,
                'category_id'=>$request->category,
                'image'=>$upload_path,
                'status'=>$request->status
            ]);

            $notification=array(
                'messege'=>'Created Successfully',
                'alert-type'=>'success'
            );

            return redirect()->route('admin.product.index')->with($notification);

        }

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
        $categories=Category::all();
        $product=Product::find($id);
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'category'=>'required'
        ]);

        $image=$request->file('image');
        $oldImage=$request->old_image;
        $newImage=$oldImage;
        if($image){
            $ext=$image->getClientOriginalExtension();
            $name= date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $path='uploads/product/';
            $upload_path=$path.$name;
            Image::make($image)
                    ->resize(168,168)
                    ->save($upload_path);
            unlink($oldImage);
            $newImage=$upload_path;
        }

        Product::where('id',$id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'price'=>$request->price,
            'category_id'=>$request->category,
            'image'=>$newImage,
            'status'=>$request->status
        ]);

        $notification=array(
            'messege'=>'Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $image=$product->image;
        Product::destroy($id);
        unlink($image);
        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.product.index')->with($notification);
    }
}
