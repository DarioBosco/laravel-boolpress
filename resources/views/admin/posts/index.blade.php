@extends('layouts.dashboard')

@section('content')


<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Published</th>
            <th scope="col">Controls</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>{{($post->published) ? 'true' : 'false' }}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">Details</a>
                <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post) }}">Modify</a>
                <a class="btn btn-danger" href="">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
