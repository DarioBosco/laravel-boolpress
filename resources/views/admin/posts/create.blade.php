@extends('layouts.dashboard')

@section('content')
<form action="{{route('admin.posts.store')}}" method="post">
    @csrf
    @method('POST')

    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Title</div>
        <div class="card-body">
            <input type="text" class="form-control" name="title" id="title">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Content</div>
        <div class="card-body">
            <textarea class="form-control" name="content" id="content"></textarea>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Author</div>
        <div class="card-body">
            <input type="text" class="form-control" name="author" id="author">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Status</div>
        <div class="card-body">
            <select class="form-control" name="is_public" id="status">
                <option value="1">Public</option>
                <option value="0">Hidden</option>

            </select>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
