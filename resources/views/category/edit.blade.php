@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-4 mt-5 mb-5">

            <form action="{{route('category.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="cat_name" class="form-label">Category Name</label>
                    <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" id="cat_name" aria-describedby="emailHelp">
                    @error('category_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3"> 
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{$category->status == 1 ? 'selected' : ''}}>Active</option>
                        <option value="2" {{$category->status == 2 ? 'selected' : ''}}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection