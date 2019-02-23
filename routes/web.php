<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'UserController@showMinProduct');

Auth::routes();



//Route::get('/home', 'InsertProduct@ mostsearchedforhome');

Route::get('/autocomplete', 'InsertProduct@index');
Route::post('/autocomplete/fetch', 'InsertProduct@fetch')->name('autocomplete.fetch');

Route::get('/index', 'Controller@index');
Route::post('/upload','Controller@upload');
Route::post('/index/search', 'InsertProduct@index')->name('index.search');




//Route::get('/home', 'HomeController@index')->name('home');



//Route::get('/profile/updatePro','UserController@ShowForUpdateProduct');

Route::group(['middleware' => 'UserMiddleware'], function () {
    Route::get('/profile','UserController@ShowDataProfile')->name('profile');
    Route::get('/profile/updateUser', 'UserController@ShowForUpdateUser');
    Route::post('/insertProductByUser', 'UserController@insertProduct');
    Route::get('/profile/{id}/editProduct', 'UserController@editProduct');
    Route::post('/profile/{id}/update', 'UserController@updateProduct');
    Route::get('/profile/{id}/editUser', 'UserController@editUser');
    Route::get('/{id}/deleteFromUser', 'UserController@destroyProduct');
    Route::post('/profile/{id}/updateUser', 'UserController@updateUser');
    Route::get('/deals','DealController@index');
    Route::get(' /Browse','DealController@browse');
    Route::post('/store','DealController@store');
    Route::get('/deletedeal/{id}', 'DealController@destroy');
    Route::get('/home', 'InsertProduct@ mostsearchedforhome');
});
Route::get('/deals','DealController@index');

Route::get('/isadmin' , 'AdminController@isadmin');

Route::get('/isadmin' , 'AdminController@isadmin');

Route::group(['middleware' => 'AdminMiddleware'], function () {
    Route::get('/dashboard' , 'AdminController@showDashboard');
    Route::get('/adminadd', 'AdminController@getCatID');
    Route::post('/add' , 'AdminController@store');
    Route::get('/showFormCategory' , 'AdminController@showCatForm');
    Route::post('addCategory' , 'AdminController@insertCategory')->name('addcategory');
    Route::get('showCat','AdminController@getCatIDforshow');
    Route::get('showProductByCatId/{id}','AdminController@show');
    Route::get('/{id}/delete', 'AdminController@destroy' );
    Route::get('/showProductByCatId/{{$product->id}}/edit', 'AdminController@updateProduct' );
    Route::get('showproductforupdate', 'AdminController@showProductUpdate' );
    Route::get('/{id}/deleteUser', 'AdminController@deleteUserByAdmin' );
    Route::get('/showProductByCatId/{idd}/edit1', 'AdminController@edit1');
    Route::post('/showProductByCatId/{idd}/update', 'AdminController@updateProduct');
    Route::get('/{id}/deleteCategory' , 'AdminController@deleteCategory');
    Route::get('/allproducts' , 'AdminController@showAllProducts');
    Route::get('/showdeals' , 'DealController@showdealsforadmin');
    Route::get('/delete/{id}', 'DealController@destroydealfromadmin');
//    Route::get('/{Did}/showDetailsProduct' , 'AdminController@show');
});

Route::post('/insertsearch','RatingController@insertsearch');
Route::get('/insertsearch', function () {
    return view('products');
});

Route::post('/dislike','RatingController@dislike');
Route::post('/like','RatingController@like');
/////////////////////////////////////
Route::get('/like', 'likedislikecontroller@index')->name('like');
Route::get('posts', 'likedislikecontroller@posts')->name('posts');
Route::post('ajaxRequest', 'likedislikecontroller@ajaxRequest')->name('ajaxRequest');
Route::get('create-chart/{type}','ChartController@makeChart');
Route::get('/mostsearched','InsertProduct@mostsearchedforpage');
Route::get('/','InsertProduct@mostsearchedforhome');
Route::get('/wishlist/{id}','WishlistController@addtowishlist');



Route::get('/details/{id}','ProductDetailController@showproductdetail');
Route::post('/storecomment/{id}','ProductDetailController@sorecomment');
Route::get('/place/{id}','InsertProduct@place');
Route::get('fetchlike', 'AjaxController@fetchlike');
Route::get('fetchdislike', 'AjaxController@fetchdislike');
Route::get('addtowishlist','AjaxController@addtowishlist');
Route::get('/category/{id}','UserController@showByCategory');



Route::get('/piechart','ChartController@piechart');

Route::get('/fetchchartdate','ChartController@fetchchartdate');
Route::get('/fetchdailyproduct','ChartController@fetchproductspostedeveryday');

Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/login/twitter', 'Auth\LoginController@redirectToProvidertwitter');
Route::get('/login/twitter/callback', 'Auth\LoginController@handleProviderCallbacktwitter');

Route::get('/login/github', 'Auth\LoginController@redirectToProvidergithub');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallbackgithub');

Route::get('/login/google', 'Auth\LoginController@redirectToProvidergoogle');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallbackgoogle');


Route::get('/master','UserController@masterCat');


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
//Route::get('/details/{}','ProductDetailController@sendCat');

//Route::get('sendemail',function (){
//  $data=array(['name'=>'Doaa','email'=>'doaabakhiet11@gmail.com']);
//});

