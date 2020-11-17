@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>New Post...</h3>
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="category">Category (use 'Ctrl' or 'Shift' to multiple select)</label>

                        <select name="category[]" id="category" class="form-control" required multiple size="6">
                            <option value="no_category">No category</option>
                            @foreach($allCategories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <a href="{{route('category.create')}}" class="btn btn-success mt-2"><i class="fa fa-plus"></i> Add Category</a> <br>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="slug">Slug (URL) будет сформирован автоматически если оставить пустым</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug')}}">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="status">Published/Draft*</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="published">Published</option>
                            <option value="draft" selected>Draft</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="mark">Mark*</label>
                        <select name="mark" id="mark" class="form-control" required>
                            <option value=" " selected>No mark</option>
                            <option value="main">Main (only one)</option>
                            <option value="secondary-1">Secondary-1(only one)</option>
                            <option value="secondary-2">Secondary-2(only one)</option>
                            <option value="interesting" >Interesting(5 post) </option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="lg_image">Large Image (1200x800)*</label>
                        <input type="file" name="lg_image" id="lg_image" accept="image/jpeg" class="form-control-file" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="md_image">Medium Image (700x467)*</label>
                        <input type="file" name="md_image" id="md_image" accept="image/jpeg" class="form-control-file" required>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="sm_image">Small Image (180x120)*</label>
                        <input type="file" name="sm_image" id="sm_image" accept="image/jpeg" class="form-control-file" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="header_image">Header Image (1920x720)*</label>
                        <input type="file" name="header_image" id="header_image" accept="image/jpeg" class="form-control-file" required>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="gallery_image">Gallery Image (120x120)*</label>
                        <input type="file" name="gallery_image" id="gallery_image" accept="image/jpeg" class="form-control-file" required>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="description">Description (155)</label>
                        <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="my_content" id="content" cols="30" rows="8" class="form-control">{{old('my_content')}}</textarea>
                    </div>
                    <hr>

                    {{--Вставка изображения в пост--}}
                    {{--<a href="{{route('newImageToContent')}}" class="btn btn-outline-dark">Добавить изображение к посту</a>--}}




                    <hr>
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                    <div class="form-group">

                        <label for="tag">Tags (use ',' to separate tags)</label>
                        <input type="text" name="tags" value="{{old('tags')}}" class="form-control" required>
                    </div>

                    <button class="btn btn-success">Store</button>


                </form>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection
