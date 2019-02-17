<?php

namespace App\Http\Controllers;
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

       if( Auth::user()->type==2)
       {
           return view('admin.mainPage',compact('catName' , 'users' , 'countOfUsers' , 'countOfProducts'));
       }
       else{
           return redirect('/');
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
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function showCatForm(){
        return view('admin.addCategory' );
    }
    public function showDashboard()
    {
        $catName=DB::table('categories')->get();
        $users = DB::table('users')->get();
        $countOfUsers = DB::table('users')->count();
        $countOfProducts = DB::table('products')->count();

        return view('admin.mainPage' , compact('catName' , 'users' , 'countOfUsers' , 'countOfProducts') );
    }



    public function store(Request $request)
    {

        $this->validate($request,[
            'productName'=>'required|string',
            'productPrice'=>'required',
            'productAddress'=>'required|string',
            'productDescription'=>'required|string|min:30',
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
         return back();
    }


    public function insertCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName'=>'required|string|unique:categories'
        ]);
           $catname=$request->catname;
        if(DB::table('categories')->where('categoryName','like',$catname)->exists()) {
            return redirect()->back()-> with('alert ','is  exist');
        }

            else{
                $category = new Category();
                $category->categoryName =  $request->catname;
                $category->save();
                return back();

            }
        }


    public function show($id)
    {
      //$products = DB::table('products')->where('catid', '=', $id)->get();
             $products = DB::table('products')
                ->leftJoin('categories', 'products.catId', '=', 'categories.id')
                ->leftJoin('users', 'products.userId', '=', 'users.id')->where('catid', '=', $id)
                 ->select('products.*','categories.categoryName','users.name')
                ->get();
            $catName=DB::table('categories')->get();


                return view('admin.showproductbycatid', compact('products'),compact('catName'));
    }



    public function edit($id)
    {
        //
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
            'productDescription'=>'required|string|min:30',
            'productImage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        DB::table('products')-> where('id',$id)->update(array('productName'=>$request->productName,
            'productPrice'=>$request->productPrice,
            'productAddress'=>$request->productAddress,
            'productDescription'=>$request->productDescription,
            'productImage'=>$request->productImage,
            'catId'=>$request->catId,

            ));
        return back();
    }

    public function edit1(Product $idd){
        $catName=DB::table('categories')->get();
        return view ('admin.showproductforupdate',compact('idd'), compact('catName'));
    }


    public function deleteUserByAdmin(User $id){
        $id->delete();
        return back();
    }

}
