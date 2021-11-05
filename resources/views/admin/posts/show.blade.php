@extends('layouts.dashboard')

@section('content')
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Post ID</div>
    <div class="card-body">
        <p class="card-text">{{$post->id}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Post Title</div>
    <div class="card-body">
        <p class="card-text">{{$post->title}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Post Content</div>
    <div class="card-body">
        <p class="card-text">{{$post->content}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Post Author</div>
    <div class="card-body">
        <p class="card-text">{{$post->author}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Status</div>
    <div class="card-body">
        <p class="card-text">{{($post->is_public) ? 'Public' : 'Hidden' }}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Creation Date</div>
    <div class="card-body">
        <p class="card-text">{{$post->created_at}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Last Edited</div>
    <div class="card-body">
        <p class="card-text">{{$post->updated_at}}</p>
    </div>
</div>
@endsection
