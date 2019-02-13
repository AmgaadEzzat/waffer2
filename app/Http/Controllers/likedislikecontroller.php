<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
class likedislikecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('homee');
    }
    public function posts()
    {
        $posts = Post::get();
        return view('posts', compact('posts'));
    }

    public function ajaxRequest(Request $request){
        $post = Post::find($request->id);
        $response = auth()->user()->toggleLike($post);
        return response()->json(['success'=>$response]);
    }
}
