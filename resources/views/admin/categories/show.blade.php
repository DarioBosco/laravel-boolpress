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
@endsection
