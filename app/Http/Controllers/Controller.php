<?php

namespace App\Http\Controllers;

use App\Product;
use http\Env\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        return view('autocomplete');
    }



    public function search(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
                ->where('productName', 'LIKE', "%{$query}%")
                ->get();
            $output="";
            foreach($data as $row)
            {
                $output .= $row->productName;
            }

            echo $output;
        }

    }



    public  function upload(\Illuminate\Http\Request $request){

        $product=$request->photos;
        $photos = count($request->photos);
        //dd($product);




        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] =$product ;
        }
        dd($rules);

    /*   foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');


            console.log(ProductsPhoto);
        }

        return 'Upload successful!';



        return $rules;*/

    }
}
