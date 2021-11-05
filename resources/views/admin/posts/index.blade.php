
@extends('layouts.dashboard')

@section('content')

<ul>
    @foreach ($posts as $post)
    <li>
        @dump($post)
    </li>
    @endforeach
</ul>
@endsection
