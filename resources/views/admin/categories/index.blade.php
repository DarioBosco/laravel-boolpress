@extends('layouts.dashboard')

@section('content')

<a class="btn btn-primary mb-3" href="{{route('admin.categories.create')}}">Make a new category</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">slug</th>
            <th scope="col">Controls</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('admin.categories.show', $category)}}">Details</a>
                <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category) }}">Modify</a>
                <a class="btn btn-danger" data-toggle="modal" data-target="#deleteCategory{{$category->id}}" href="#deletecategory">Delete</a>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="deleteCategoryLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCategoryLabel">Delete confirmation: Category # {{$category->id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You are about to <strong>permanently</strong> delete the category from the database.</p>
                        <p>Are you sure you want to delete it?</p>
                        <p><strong>The action cannot be reversed</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection






