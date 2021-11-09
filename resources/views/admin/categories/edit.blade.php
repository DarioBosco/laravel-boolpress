@extends('layouts.dashboard')

@section('content')
<form action="{{route('admin.categories.update', $category->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Category ID</div>
        <div class="card-body">
            <input disabled type="text" class="form-control" value="{{$category->id}}"name="id" id="id">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Category Name</div>
        <div class="card-body">
            <input type="text" class="form-control" value="{{$category->name}}"name="name" id="name">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Category Slug</div>
        <div class="card-body">
            <input type="text" class="form-control" disabled value="{{$category->slug}}"slug="slug" id="slug">
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
