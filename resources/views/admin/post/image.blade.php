@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Image...</h3>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <form action="{{route('post.images.update',['id' => $postId, 'image_size' => $imageSize])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <img src="/{{$imagePath}}" class="img-thumbnail" alt="">
                    <hr>
                    <h3>{{$imageSize}}</h3>
                    <input type="file" name="new_image" class="form-control-file" id="">
                    <hr>
                    <button class="btn btn-warning"><i class="fa fa-save"></i> Save new image</button>
                </form>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    @endsection