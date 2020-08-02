@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  
        
          <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('backend.partials.messages')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->description }}">
            </div>     
            
            <div class="form-group">
              <label for="exampleInputPassword1">Parent Category (optional)</label>
              <select class="form-control" name="parent_id">
                <option value="">Please select a Primary category</option>
                @foreach ($main_categories as $cat)
                  <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
              </select>

            </div>
            
           <div class="form-group">
              <label for="oldimage">Category Old Image</label> <br>

              <img src="{!! asset('images/categories/'.$category->image) !!}" width="100"> <br>

              <label for="image">Category New  Image (optional)</label>

              <input type="file" class="form-control" name="image" id="image" >
            </div>

            <button type="submit" class="btn btn-primary">Edit Category</button>
        </form>

        <div>
        </div>

        @endsection
