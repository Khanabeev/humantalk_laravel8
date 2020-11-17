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

                <table id="myTable" class="display table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Tag name</th>
                        <th>slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>
                                <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                {{--Delete button--}}
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-danger btn-sm" id="delete-{{$tag->id}}"><i class="fa fa-trash"></i></button>
                                    <form action="{{route('tag.destroy', $tag->id)}}" method="POST" id="form-{{$tag->id}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                    <script>
                                        let form_{{$tag->id}} = document.getElementById("form-{{$tag->id}}");
                                        document.getElementById("delete-{{$tag->id}}").addEventListener("click", function () { confirm('Are you sure?');
                                            form_{{$tag->id}}.submit();
                                        });
                                    </script>
                                </div></td>
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