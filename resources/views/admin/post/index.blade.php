@extends('layouts.app')

@section('head')
    {{--DataTables style--}}
    <link rel="stylesheet" href="{{asset('datatable/datatables.min.css')}}">
    @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif

                <a href="{{route('post.create')}}" class="btn btn-success mb-2"><i class="fa fa-plus"></i> &nbsp; Create New Post</a>
                <table id="myTable" class="display table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Mark</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a href="{{route('post.edit',['id'=>$post->id])}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->status}}</td>
                        <td>{{$post->mark}}</td>
                        <td>
                            {{--Edit button--}}
                            <div class="btn-group" role="group">
                                <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            </div>

                            {{--Delete button--}}
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-danger btn-sm" id="delete-{{$post->id}}"><i class="fa fa-trash"></i></button>
                                <form action="{{route('post.destroy', $post->id)}}" method="POST" id="form-{{$post->id}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
                                <script>
                                    let form_{{$post->id}} = document.getElementById("form-{{$post->id}}");
                                    document.getElementById("delete-{{$post->id}}").addEventListener("click", function () { confirm('Are you sure?');
                                        form_{{$post->id}}.submit();
                                    });
                                </script>
                            </div>


                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    @endsection
@section('script')

    {{--DataTable--}}
    <script src="{{asset('datatable/datatables.min.js')}}"></script>
    {{--/DataTable--}}

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    @endsection

