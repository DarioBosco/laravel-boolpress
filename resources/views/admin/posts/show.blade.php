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
    <div class="card-header bg-primary fw-bold">Slug</div>
    <div class="card-body">
        <p class="card-text">{{$post->slug}}</p>
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Category</div>
    <div class="card-body">
        @if ($post->category)
        <a href="{{route('admin.categories.show', $post->category->id)}}">{{$post->category->name}}</a>
        @else
        <p class="card-text">Nessuna categoria associata a questo post.</p>
        @endif
    </div>
</div>
<div class="card my-3">
    <div class="card-header bg-primary fw-bold">Tags</div>
    <div class="card-body">
        @if (count($post->tags)) {{-- Trovare un modo migliore di effettuare questo controllo --}}
        @foreach ($post->tags as $tag)
        <span class="badge badge-success text-white">{{$tag->name}}</span>
        @endforeach
        @else
        <p class="card-text">Nessun tag associato a questo post.</p>
        @endif
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
