@extends('layouts.dashboard')

@section('content')

<a class="btn btn-primary mb-3" href="{{route('admin.posts.create')}}">Make a new post</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Status</th>
            <th scope="col">Controls</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{($post->is_public) ? 'Public' : 'Hidden' }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">Details</a>
                <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post) }}">Modify</a>
                <button onclick="" class="btn btn-danger" data-toggle="modal" data-post="{{$post->id}}" data-target="#deletePost" href="#deletePost">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<!-- Modal -->
<div class="modal fade" id="deletePost" data-post="{{$post->id}}" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePostLabel">Delete confirmation: Post # {{$post->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You are about to <strong>permanently</strong> delete the post from the database.</p>
                <p>Are you sure you want to delete it?</p>
                <p><strong>The action cannot be reversed</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Confirm Delete</button>
            </div>
        </div>
    </div>
</div>
