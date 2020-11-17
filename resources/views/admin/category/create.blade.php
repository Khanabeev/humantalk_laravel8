@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Create Category...</h3>

                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Category Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" required value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Category Image (1920x480)</label>
                        <input type="file" name="image" id="image" accept="image/jpeg" required>
                    </div>

                    <button class="btn btn-success"><i class="fa fa-save"></i>&nbsp; Create</button>
                </form>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    @endsection