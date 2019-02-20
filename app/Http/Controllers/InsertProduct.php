<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Search;
use Illuminate\Support\Facades\DB;

class InsertProduct extends Controller
{
    /*public function  insert(Request $request){

        $categoryname=$request->categoryname;
        $catId=DB::table('categories')->where('categoryName', '=', $categoryname)->get();
        $userid=Auth::user()->id;
        $product=new Product();
        $product->productName=$request->productName;
        $product->productPrice=$request->productPrice;
        $product->productAddress=$request->productAddress;
        $product->productDescription=$request->productDescription;
        $product->userId=$userid;
        $product->catId=$request->catId;
        $product->save();
    }*/

    function index()
    {
        return view('welcome');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
                ->where('productName', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li><a href="#" class="text-dark">'.$row->productName.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


  public function insertsearch(Request $request){
         $search= new Search();
         $search->searchName = $request->txtsearch;
         $search->save();
         $inputseearch=$request->txtsearch;
        $searchResult=DB::table('products')
             ->where('products.productName','like','%'.$inputseearch.'%')
            ->orderBy('products.productPrice')->get();
         return view('products',compact('searchResult'));
}


public function mostsearchedforhome()
{

//    $mostsearchcount=DB::Select('select count(productName) from products where productName in
//(select distinct(searchName) from searchs order by (created_at)group by productName');
    $mostsearchproduct=DB::Select('select products.* from products where productName 
in (select distinct(searchName) from searchs order by  	created_at)');

    $productname = DB::table('products')
        ->select('productName',DB::raw('MIN(productPrice) as minPrice '))
        ->groupBy('productName');

    $products = DB::table('products')
        ->joinSub($productname, 'productname', function($join) {
            $join->on('products.productName','=','productname.productName');
            $join->on('productname.minPrice', '=', 'products.productPrice' );
        })->join('categories','products.catId','=','categories.id')->get();




    $catName=DB::table('categories')->get();
//    $products = DB::table('products')
//        ->joinSub($productname, 'productname', function($join) {
//            $join->on('products.productName','=','productname.productName');
//            $join->on('productname.minPrice', '=', 'products.productPrice' );
//        })->get();


    $places=DB::table('products')->select('productAddress')->distinct()->get();
   return view ('welcome',compact('mostsearchproduct' ,'products','catName','places'));

}


public function place($id){
        $place=DB::table('products')->leftJoin('users','products.userId','=','users.id')
            ->where('products.productAddress','=',$id)
            ->select('products.*','users.name')
            ->get();
        return view('place',compact('place'));
}
    public function mostsearchedforpage(){
        $mostsearchproduct=DB::Select('select products.* from products where productName in (select distinct(searchName) from searchs order by  	created_at)');
        return view ('mostsearch',compact('mostsearchproduct'));
    }

}
