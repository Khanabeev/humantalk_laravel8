@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h3>Edit Post...</h3>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <a href="{{route('post.index')}}" class="btn btn-success mb-2 mt-2"><i class="fas fa-arrow-left"></i> Back</a>

                <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="slug">Slug (URL)*</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{$post->slug}}">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="status">Published/Draft*</label>
                        <select name="status" id="status" class="form-control" >

                            @foreach([' ','published','draft'] as $item)
                                @if($post->status === $item)
                                    <option value="{{$item}}" selected>{{$item}}</option>
                                @else
                                    <option value="{{$item}}">{{$item}}</option>
                                @endif
                                @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="mark">Mark*</label>
                        <select name="mark" id="mark" class="form-control" >
                            @foreach([' ','main','secondary-1','secondary-2','interesting'] as $item)
                                @if($post->mark === $item)
                                    <option value="{{$item}}" selected>{{$item}}</option>
                                @else
                                    <option value="{{$item}}">{{$item}}</option>
                                @endif
                                @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">large image</label>
                            <img class="img-thumbnail" src="/{{$post->lg_image}}" alt="">
                            <a href="{{route('post.images.edit',['id' => $post->id, 'image_size' => 'lg_image'])}}" class="btn btn-warning"><i class="fa fa-image"></i>&nbsp 1200x800</a>
                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3">
                            <label for="">medium image</label>
                            <img class="img-thumbnail" src="/{{$post->md_image}}" alt="">
                            <a href="{{route('post.images.edit',['id' => $post->id, 'image_size' => 'md_image'])}}" class="btn btn-warning"><i class="fa fa-image"></i>&nbsp 700x467</a>
                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3">
                            <label for="">small image</label>
                            <img class="img-thumbnail" src="/{{$post->sm_image}}" alt="">
                            <a href="{{route('post.images.edit',['id' => $post->id, 'image_size' => 'sm_image'])}}" class="btn btn-warning"><i class="fa fa-image"></i>&nbsp 180x120</a>
                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3">
                            <label for="">header image</label>
                            <img class="img-thumbnail" src="/{{$post->header_image}}" alt="">
                            <a href="{{route('post.images.edit',['id' => $post->id, 'image_size' => 'header_image'])}}" class="btn btn-warning"><i class="fa fa-image"></i>&nbsp 1920x480</a>
                        </div>
                        <!-- /.col-md-3 -->
                        <div class="col-md-3 mt-1">
                            <label for="">gallery image</label>
                            <img class="img-thumbnail" src="/{{$post->gallery_image}}" alt="">
                            <a href="{{route('post.images.edit',['id' => $post->id, 'image_size' => 'gallery_image'])}}" class="btn btn-warning"><i class="fa fa-image"></i>&nbsp 120x120</a>
                        </div>
                        <!-- /.col-md-3 -->
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="category">Category (use 'Ctrl' or 'Shift' to multiple select)</label>

                        <select name="category[]" id="category" class="form-control" multiple size="5" required>
                            <option value="no_category">No category</option>
                            @php
                            $array = [];
                            foreach ($post->category as $postCategory){
                            array_push($array, $postCategory->name);
                            }
                            @endphp
                            @foreach($allCategories as $category)
                                @if(in_array($category->name, $array))
                                    <option value="{{$category->name}}" selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>

                        <a href="/#" class="btn btn-success mt-2"><i class="fa fa-plus"></i> Add Category</a> <br>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="description">Description (155)</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{$post->description}}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="my_content" id="content" cols="30" rows="8" class="form-control">{{html_entity_decode($post->content)}}</textarea>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                    <div class="form-group">

                        <label for="tag">Tags (use ',' to separate tags)</label>
                        <input type="text" name="tags" value="{{$post->tag->implode('name', ', ')}}" class="form-control" >
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