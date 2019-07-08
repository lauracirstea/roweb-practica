@extends('layouts.base')

@section('content')

    <h1>Category</h1>

    <a href="#" class="btn btn-primary a-btn-slide-text" id="edit-item" data-toggle="modal" data-target="#create">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <span><strong>Create</strong></span>
    </a>


    <table class="table table-bordered">
        <tr>
            <th>Category</th>
            <th>Parent</th>
            <th>Actions</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td> {{ $category->name }}</td>
                <td>   {{$category->parent_id}}</td>
                <td>
                    <a href="categories/{{$category->id}}/edit" class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Edit</strong></span>
                    </a>
                </td>
                <td>
                    <form method="POST"  action="/categories/{{ $category->id }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger a-btn-slide-text">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span><strong>Delete</strong></span>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach


    </table>

    @include('category.create')
    {{$categories->links()}}

@endsection



