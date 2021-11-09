@extends('layouts.dashboard')

@section('content')
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Category ID</div>
    <div class="card-body">
        <p class="card-text">{{$category->id}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Category Name</div>
    <div class="card-body">
        <p class="card-text">{{$category->name}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Category Slug</div>
    <div class="card-body">
        <p class="card-text">{{$category->slug}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Creation Date</div>
    <div class="card-body">
        <p class="card-text">{{$category->created_at}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Last Edited</div>
    <div class="card-body">
        <p class="card-text">{{$category->updated_at}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Post Associati</div>
    <div class="card-body">
        <ul class="p-0 list-unstyled">
            @forelse ($category->posts as $post)
            <li class="card-text"><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></li>
        </ul>
        @empty
        <p class="card-text">Nessun post collegato alla categoria</p>
        @endforelse
    </div>
</div>

@endsection
