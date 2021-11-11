@extends('layouts.dashboard')

@section('content')
<form action="{{route('admin.posts.store')}}" method="post">
    @csrf
    @method('POST')
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Title</div>
        <div class="card-body">
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger"> {{ $message }} </div>
            @enderror
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Content</div>
        <div class="card-body">
            <textarea class="form-control" name="content" id="content">{{old('content')}}</textarea>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Post Author</div>
        <div class="card-body">
            <input type="text" class="form-control" name="author" id="author" value="{{Str::ucfirst(Auth::user()->name)}}">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header bg-primary fw-bold">Category</div>
        <div class="card-body">
            <select type="text" class="form-control" name="category_id" id="category_id">
                <option value="">-- Seleziona una categoria --</option>
                @foreach ($categories as $category)
                <option {{old('category_id') == $category->id ? 'selected' : NULL}} value="{{$category->id}}">{{$category->name}}</option>
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
                    <input value="{{ $tag->id }}" type="checkbox" name="tags[]" class="form-check-input" id="tag-{{$tag->id}}">
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
                <option {{old('is_public') == 1 ? 'selected' : NULL }} value="1">Public</option>
                <option {{old('is_public') == 0 ? 'selected' : NULL }} value="0">Hidden</option>
            </select>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
