<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|unique:categories'
        ]);

        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status
        ]);

        $notification=array(
            'messege'=>'Created Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.category.index')->with($notification);
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
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
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
            'name'=>'required|unique:categories,name,'.$id
        ]);

        Category::where('id',$id)->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'status'=>$request->status
        ]);

        $notification=array(
            'messege'=>'Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        $notification=array(
            'messege'=>'Deleted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.category.index')->with($notification);
    }
}
