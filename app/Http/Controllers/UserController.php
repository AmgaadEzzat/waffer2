<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function showAddProduct()
    {
        $catName=DB::table('categories')->get();
        return view('user.userProfile' , compact('catName'));
    }
    public function masterCat()
    {
        $catName = DB::table('categories')->get();
        return view('user.master', compact('catName'));
    }

    public function masterCategory(Category $id)
    {

        $oneCategory= DB::table('categories')->where('id', '=',$id )->get();
        $catgoryPro = DB::table('products')->where('catId','=',$id)->get();
        return view('user.category', compact('oneCategory'),compact('catgoryPro'));
    }


    public function insertProduct(Request $request)
    {
        $this->validate($request,[
            'productName'=>'required|string',
            'productPrice'=>'required',
            'productAddress'=>'required|string',
            'productDescription'=>'required|string|min:15',
            'productImage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $userId=Auth::user()->id;
        $catname=$request->catname;
        $catid=DB::table('categories')->where('categoryName','=',$catname)->get();
        $product = new Product();
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
        $product->productAddress = $request->productAddress;
        $product->productDescription = $request->productDescription;
        $product->like=0;
        $product->dislike=0;
        $this->validate($request, ['productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $product->productImage = $name;
        }
        $product->userId =  $userId;
        foreach ($catid as $id)
            $product->catId =  $id->id;
        $product->save();
        session()->flash("notif","Success to Insert Product");
        return back();

    }
    public function editProduct(Product$id)
    {
        $userId=Auth::user()->id;
        $userData = DB::table('users')->where('id', '=',$userId )->get();
        $productForUser = DB::table('products')->where('userId','=',$userId)->get();
        $catName=DB::table('categories')->get();
        return view('user.editProduct',compact('id','catName','userData' , 'productForUser'));
    }

    public function editUser($id)
    {

        $userId=Auth::user()->id;
        $userData = DB::table('users')->where('id', '=',$userId )->get();
        return view('user.editUser',compact('id','userData'));
    }
    public function updateProduct(Request $request, $id)
    {
      
        $this->validate($request,[
            'productName'=>'required|string',
            'productPrice'=>'required',
            'productAddress'=>'required|string',
            'productDescription'=>'required|string|min:15',
            'productImage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        session()->flash("notif","Success to Update Product");
   


        $newProduct = Product::find($id);
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $newProduct->productImage = $name;
        }
        $userId=Auth::user()->id;
        $newProduct->userId =  $userId;
        $newProduct->productPrice = $request->productPrice;
        $newProduct->productAddress = $request->productAddress;
        $newProduct->productName = $request->productName;
        $newProduct->catId = $request->catId;

        $newProduct->save();
        return back();

    }

  

    public function updateUser(Request $request, $id)
    {
        
        DB::table('users')-> where('id',$id)->update(array('name'=>$request->name,
            'email'=>$request->email,
            'city'=>$request->city,
            'phone'=>$request->phone,
            'password'=>$request->password


        ));
        session()->flash("notif","Success to Update Your Info");
        return back();
    }



    public function destroyProduct(Product $id)
    {
        $id->delete();
        session()->flash("notif","Success to delete Product '$id->productName'");
        return back();
    }



    public function ShowDataProfile()
    {
        $userId=Auth::user()->id;
        $userData = DB::table('users')->where('id', '=',$userId )->get();
        $productForUser = DB::table('products')->where('userId','=',$userId)->get();
        $catName=DB::table('categories')->get();
        return view('user.userProfile',compact('catName','userData' , 'productForUser'));
    }


    public function ShowForUpdateProduct()
    {
        $userId=Auth::user()->id;
        $userData = DB::table('users')->where('id', '=',$userId )->get();
        $productForUser = DB::table('products')->where('userId','=',$userId)->get();
        $catName=DB::table('categories')->get();
        return view('user.editProduct',compact('catName','userData' , 'productForUser'));
    }


    public function ShowForUpdateUser()
    {
        $userId=Auth::user()->id;
        $userData = DB::table('users')->where('id', '=',$userId )->get();
        $productForUser = DB::table('products')->where('userId','=',$userId)->get();
        $catName=DB::table('categories')->get();
        return view('user.editUser',compact('catName','userData' , 'productForUser'));
    }


}
