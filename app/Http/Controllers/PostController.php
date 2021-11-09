<?php

namespace App\Http\Controllers;
use App\Post;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::where('is_public', 1)->get();
        return view('guest.index', compact('posts'));
    }

    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if(!$post){
            abort(404);
        }
        return view('guest.show', compact('post'));
    }
}
