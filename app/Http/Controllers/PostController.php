<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = DB::select('select * from posts where is_public = ?', [1]);
        return view('user.index', compact('posts'));
    }

    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function show(Post $post)
    {
        //
    }
}
