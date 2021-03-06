<?php

namespace App\Http\Controllers;
use App\User;
use validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
class AdminController extends Controller
{


    public function isadmin(){
        $catName=DB::table('categories')->get();
        $users = DB::table('users')->get();
        $countOfUsers = DB::table('users')->count();
        $countOfProducts = DB::table('products')->count();
        $countOfCategories = DB::table('categories')->count();

       if( Auth::user()->type==2)
       {
           return view('admin.mainPage',compact('catName' , 'users' , 'countOfUsers' , 'countOfProducts' , 'countOfCategories'));
       }
       else{
           return redirect('/profile');
       }
    }

   public function getCatID(){
        $catName=DB::table('categories')->get();
        return view('admin.add' , compact('catName'));
    }
    public function getCatIDforshow(){
        $catName=DB::table('categories')->get();
        return view('admin.mainPage' , compact('catName'));
    }
    
    public function showDetailsProduct(Product $id)
    {
        $detailsProducts = DB::table('products')->where('id' ,' =' , 'id')->get();
        return view('admin.showproductbycatid' , compact('detailsProducts'));
    }

    public function deleteCategory(Category $id )
    {
        $id->delete();
        return back();
    }
    public function showCatForm(){
        $categories = DB::table('categories')->get();
        return view('admin.addCategory' , compact('categories'));
    }
    public function showDashboard()
    {
        $catName=DB::table('categories')->get();
        $users = DB::table('users')->get();
        $countOfUsers = DB::table('users')->count();
        $countOfProducts = DB::table('products')->count();
        $countOfCategories = DB::table('categories')->count();
        return view('admin.mainPage' , compact( 'catName','users' , 'countOfUsers' , 'countOfProducts' , 'countOfCategories') );
    }


    public function store(Request $request)
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
         $product->like = 0;
         $product->dislike=0;
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
        session()->flash('notif','Success to save Product');
        return back();
    }


    public function insertCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName'=>'required|string|unique:categories'
        ]);


                $category = new Category();
                $category->categoryName =  $request->categoryName;
                $category->save();
                session()->flash('notif','Success to save category');
                return back();


        }


    public function show($id   )
    {

            $products = DB::table('products')
                ->leftJoin('categories', 'products.catId', '=', 'categories.id')
                ->leftJoin('users', 'products.userId', '=', 'users.id')->where('catid', '=', $id)
                ->select('products.*', 'categories.categoryName', 'users.name')
                ->get();
            $catName = DB::table('categories')->get();

            return view('admin.showproductbycatid', compact('products', 'catName'));



    }



    public function showAllProducts()
    {
       $products = DB::table('products')
           ->leftJoin('categories', 'products.catId', '=', 'categories.id')
           ->select('products.*', 'categories.categoryName')->get();
//       dd($products);
       return view('admin.allProducts' , compact('products'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Product $id)
    {
        $id->delete();
        return back();
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

//        DB::table('products')-> where('id',$id)->update(array('productName'=>$request->productName,
//            'productPrice'=>$request->productPrice,
//            'productAddress'=>$request->productAddress,
//            'productDescription'=>$request->productDescription,
//            'productImage'=>$request->productImage,
//            'catId'=>$request->catId,
//            ));


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
//        dd($newProduct);
        $newProduct->save();
        session()->flash('notif','Success to Update Product');
        return back();
    }

    public function edit1(Product $idd){
        $catName=DB::table('categories')->get();
        return view ('admin.showproductforupdate',compact('idd'), compact('catName'));
    }


    public function deleteUserByAdmin(User $id){
        $id->delete();
        session()->flash("notif","Success to delete User '$id->name'");
        return back();
    }

}
