<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Wishlist;
use Illuminate\Http\Request;
use App\Product;
use App\Search;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function fetchlike(Request $request)
    {
        $id = $request->id;

    $userid=Auth::user()->id;
    $data = DB::table('products')
        ->where('id', '=', $id)->select('like')
        ->get();
    $output='';
    foreach($data as $row)
    {$output=$row->like;}
        $users=DB::table('ratings')->
        where('like','=',1,'AND','userId','=',$userid,'AND','productid','=',$id)->get();
        if($users->isEmpty()) {
            $rating = new Rating();
            $rating->like = 1;
            $rating->dislike = 0;
            $rating->userId = Auth::user()->id;
            $rating->productid = $id;
            $rating->save();
            $output+=1;
            DB::table('products')->where('id',$id)->update(array('like'=>$output));
            $dataa = DB::table('products')
                ->where('id', '=', $id)->select('like')
                ->get();
            $outputOfLike='';
            foreach($dataa as $row)
            {
                $outputOfLike=$row->like;
            }
        }
        else{
          DB::Delete("DELETE FROM ratings WHERE productid='$id' AND userId='$userid' AND dislike=0");
            $output-=1;
            DB::table('products')->where('id',$id)->update(array('like'=>$output));
            $dataa = DB::table('products')
                ->where('id', '=', $id)->select('like')
                ->get();
            $outputOfLike='';
            foreach($dataa as $row)
            {
                $outputOfLike=$row->like;
            }
        }
        echo $outputOfLike;
    }








    public function fetchdislike(Request $request)
    {
        $id = $request->id;
        $userid = Auth::user()->id;
        $data = DB::table('products')
            ->where('id', '=', $id)->select('dislike')
            ->get();
        $output = '';
        foreach ($data as $row) {$output = $row->dislike;}
        $users=DB::table('ratings')->
        where('dislike','=',1,'AND','userId','=',$userid,'AND','productid','=',$id)->get();
        if($users->isEmpty()) {
            $rating = new Rating();
            $rating->like = 0;
            $rating->dislike = 1;
            $rating->userId = Auth::user()->id;
            $rating->productid = $id;
            $rating->save();
            $output+=1;
            DB::table('products')->where('id',$id)->update(array('dislike'=>$output));
            $dataa = DB::table('products')
                ->where('id', '=', $id)->select('dislike')
                ->get();
            $outputOfDisLike='';
            foreach($dataa as $row)
            {
                $outputOfDisLike=$row->dislike;
            }
        }
        else{
            DB::Delete("DELETE FROM ratings WHERE dislike=1 AND productid='$id' AND userId='$userid'");
            $output-=1;
            DB::table('products')->where('id',$id)->update(array('dislike'=>$output));
            $dataa = DB::table('products')
                ->where('id', '=', $id)->select('dislike')
                ->get();
            $outputOfDisLike='';
            foreach($dataa as $row)
            {
                $outputOfDisLike=$row->dislike;
            }


        }
        echo $outputOfDisLike;
        }


        public function addtowishlist(Request $request)
        {$iconstyle='text-dark';
            $users = DB::table('wishlists')->
            where( 'productid', '=', $request->id,'AND','userId','=',Auth::user()->id)->get();
            if ($users->isEmpty()) {
$iconstyle='text-danger';
            $wishlist = new Wishlist();
            $wishlist->productid = $request->id;
            $wishlist->userId = Auth::user()->id;
            $wishlist->save();
        }
        else{
            $id=Auth::user()->id;
            DB::Delete("DELETE FROM wishlists WHERE  productid='$request->id' AND userId='$id'");
            $iconstyle='text-dark';
        }
echo $iconstyle;
        }
}
