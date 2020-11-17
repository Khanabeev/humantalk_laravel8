@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('tag.update',$tag->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="nameOfTag">Tag's Name</label>
                        <input type="text" name="name" id="nameOfTag" required class="form-control" value="{{$tag->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slugOfTag">Tag's Slug</label>
                        <input type="text" name="slug" id="slugOfTag" required class="form-control" value="{{$tag->slug}}">
                    </div>
                    <button class="btn btn-warning"><i class="fa fa-save"></i> &nbsp; Save</button>
                </form>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    @endsection