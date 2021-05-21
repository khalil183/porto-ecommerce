<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews=Review::all();
        return view('admin.review.index',compact('reviews'));
    }

    public function approve($id){
        Review::where('id',$id)->update([
            'status'=>1
        ]);
        $notification=array(
            'messege'=>'Approve Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deny($id){
        Review::where('id',$id)->update([
            'status'=>0
        ]);
        $notification=array(
            'messege'=>'Deny Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

}
