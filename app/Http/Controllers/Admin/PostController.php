<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $request->validate([
            'title' => 'required|unique:posts',
            'category_id' => 'nullable|exists:categories,id',
            'author' => 'required',
            'tags' => 'exists:tags,id'
        ]);
        $new_post = new Post();
        $new_post->fill($form_data);
        $new_post->slug = Str::slug($new_post->title);
        $new_post->save();
        if(array_key_exists('tags', $form_data)){
            $new_post->tags()->sync($form_data['tags']);
        }else{
            $new_post->tags()->sync([]);
        }
        return redirect()->route('admin.posts.index')->with('success', 'Post creato correttamente');
    }

    /**
    * Display the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Post $post)
    {
        $form_data = $request->all();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags'=>'nullable|exists:tags,id',
        ]);
        $post->update($form_data);

        if(array_key_exists('tags', $form_data)){
            $post->tags()->sync($form_data['tags']);
        }else{
            $post->tags()->sync([]);
        }
        return redirect()->route('admin.posts.index')->with('success','Post aggiornato correttamente');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
        $post->tags()->detach($post->id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','Post eliminato correttamente');
    }
}
