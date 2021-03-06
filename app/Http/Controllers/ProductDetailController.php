<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use validator;
class ProductDetailController extends Controller
{
    public function showproductdetail( $id)
    {
        $productdetails=DB::table('products')->leftJoin('users','products.userId','=','users.id')
            ->where('products.id','=',$id)
            ->select('products.*','users.*')
            ->get();
        $commentsinthisproduct=DB::table('reviws')->where('productid','=',$id)->groupBy('productid')->count();
        $comments=DB::table('reviws')->leftJoin('users','reviws.userId','=','users.id')
            ->where('reviws.productid','=',$id)
            ->select('reviws.*','users.*')
            ->get();
        $catName = DB::table('categories')->get();

            return view('user.productDetails',compact('productdetails','commentsinthisproduct','comments','id','catName'));
    }

    public function sendCat()
    {

        $catName = DB::table('categories')->get();

        return view('user.productDetails', compact('catName'));
    }


    public function sorecomment(Request $request,$id){
        $this->validate($request,[
            'Comment'=>'required|string|min:10']);
        $review=new Review();
        $review->userId=Auth::user()->id;
        $review->productid=$id;
        $review->Comment=$request->Comment;
        $review->save();
        return back();
    }




}
