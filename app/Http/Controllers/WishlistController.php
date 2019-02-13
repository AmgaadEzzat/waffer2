<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function addtowishlist( Request $request,$id)
    {
        $styleforicon="red";
        $inputsearch = $request->inputsearch;
        $addtowishlistbefore=DB::table('wishlists')->
        where('userId','=',Auth::user()->id,'AND','productid','=',$id)->get();

        $searchResult = DB::table('products')->where
        ('productName', 'like', '%' . $inputsearch . '%')
            ->orderBy('productPrice')->get();
        if($addtowishlistbefore->isEmpty()) {
            $wishlist = new Wishlist();
            $wishlist->productid = $id;
            $wishlist->userId = Auth::user()->id;
            $wishlist->save();



            $styleforicon="red";
        }

        return view('products',compact('searchResult','styleforicon','inputsearch'));
    }
}
