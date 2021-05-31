<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    //frontend
    public function postReview(Request $request ,$id){
    	$review = Review::find($request->intReviewId );
    	$review->rate = $request->intRate;
    	$review->comment = $request->stringComment;
    	$review->reviewed = 1;
    	$review->save();
    	return back()->with(['typeMsg'=>'success','msg'=>'Đánh giá thành công !']);
    }
    //backend
    public function getList(){
    	$listReview = Review::all();
    	return view('backend.review.list',compact('listReview'));
    }
}
