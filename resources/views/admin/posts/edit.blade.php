@extends('layouts.dashboard')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
        <div class="card-header bg-primary fw-bold">Category</div>
        <div class="card-body">
            <select type="text" class="form-control" name="category_id" id="category_id">
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                @if ($post->category)
                <option {{old('category_id', $post->category->id) == $category->id ? 'selected' : NULL}} value="{{$category->id}}">{{$category->name}}</option>
                @else
                <option {{old('category_id') == $category->id ? 'selected' : NULL}} value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Tags</div>
        <div class="card-body align-items-center">
            <div class="form-group m-0">
                @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input {{$post->tags->contains($tag) ? 'checked' : null}} value="{{ $tag->id }}" type="checkbox" name="tags[]" class="form-check-input" id="tag-{{$tag->id}}">
                    <label class="form-check-label" for="tag-{{$tag->id}}">{{ $tag->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Status</div>
        <div class="card-body">
            <select class="form-control" name="is_public" id="status">
                <option {{($post->is_public) ? 'selected' : NULL}} value="1">Public</option>
                <option {{(!$post->is_public) ? 'selected' : NULL}} value="0">Hidden</option>
            </select>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Slug</div>
        <div class="card-body">
            <input type="text" class="form-control" value="{{$post->slug}}"name="slug" id="slug">
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
