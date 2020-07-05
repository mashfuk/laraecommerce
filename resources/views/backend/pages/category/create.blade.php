@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">


        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
           
           <div class="form-group">
              <label for="exampleInputPassword1">Parent Category (optional)</label>
              <select class="form-control" name="parent_id">
                <option value="">Please select a Parent category</option>
                @foreach ($main_categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>

            </div>
            
            <div class="form-group">
              <label for="product_image">Category Image</label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="image" id="category_image" >
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Ad Category</button>
        </form>

        <div>
        </div>

        @endsection
