@extends('layouts.dashboard')

@section('content')

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Controls</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td>
                <a class="btn btn-primary" href="#">Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

