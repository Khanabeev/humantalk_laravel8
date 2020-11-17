@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Category...</h3>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <a href="{{route('category.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Category Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" required value="{{$category->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Category Image (1920x480)</label>
                        <img src="/{{$category->image}}" class="img-thumbnail" alt="">
                        <input type="file" name="image" id="image" accept="image/jpeg">
                    </div>

                    <button class="btn btn-warning"><i class="fa fa-save"></i>&nbsp; Edit</button>
                </form>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection