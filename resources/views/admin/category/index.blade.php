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
                <a href="{{route('category.create')}}" class="btn btn-success mb-2 mt-2"><i class="fa fa-plus"></i>&nbsp; Create New Category</a>
                <table id="myTable" class="display table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Category name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('category.edit',$category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->slug}}</td>
                            <td>
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                {{--Delete button--}}

                                    <button type="button" class="btn btn-danger btn-sm" id="delete-{{$category->id}}"><i class="fa fa-trash"></i></button>
                                    <form action="{{route('category.destroy', $category->id)}}" method="POST" id="form-{{$category->id}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                    </form>
                                    <script>
                                        let form_{{$category->id}} = document.getElementById("form-{{$category->id}}");
                                        document.getElementById("delete-{{$category->id}}").addEventListener("click", function () { confirm('Are you sure?');
                                            form_{{$category->id}}.submit();
                                        });
                                    </script>



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