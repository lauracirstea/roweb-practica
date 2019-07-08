@extends('layouts.base')

@section('content')

    <h3>Edit a new category</h3>
    <form method="POST" action="/categories/{{$category->id}}" style="width: 250px">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label class="control-label" for="name">Name of category</label>
            <input type="text" class="form-control" id="name-edit" name="name" placeholder="Category name..."
                   value="{{ $category->name }}" id="recipient-name">
        </div>

        <div class="form-group">
            <select class="form-control" id="parent-id-edit" name="parent_id" id="recipient-parent">
                <option value="0">Main Category</option>
                @foreach($levels as $val)
                    <option value="{{$val->id}}"
                            @if($val->id == $category->parent_id) selected @endif>{{$val->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection