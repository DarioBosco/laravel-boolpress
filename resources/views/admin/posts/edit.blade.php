@extends('layouts.dashboard')

@section('content')
<form action="{{route('admin.posts.update', $post->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post ID</div>
        <div class="card-body">
            <input disabled type="text" class="form-control" value="{{$post->id}}"name="id" id="id">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Title</div>
        <div class="card-body">
            <input type="text" class="form-control" value="{{$post->title}}"name="title" id="title">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Content</div>
        <div class="card-body">
            <textarea class="form-control" name="content" id="content" style="min-height: 100px">{{$post->content}}</textarea>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Author</div>
        <div class="card-body">
            <input disabled type="text" class="form-control" value="{{$post->author}}"name="author" id="author">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Status</div>
        <div class="card-body">
            <select class="form-control" name="published" id="published" value="{{$post->published}}">
                <option {{($post->published) ? 'selected' : NULL}} value="1">Published</option>
                <option {{(!$post->published) ? 'selected' : NULL}} value="0">Hidden</option>
            </select>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
