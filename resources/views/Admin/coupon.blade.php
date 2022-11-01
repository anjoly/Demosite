@extends('Admin/layout')
@section('page_title','Coupon')
@section('coupon_select','active')

@section('container')
    {{session('message')}}

    <h1 class="mb10">Coupon</h1>
    <a href="{{url('Admin/manage_coupon')}}">
    <button type="button" class="btn btn-success">
        Add Coupon
    </button>
    </a>

    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->title}}</td>
                            <td>{{$list->code}}</td>
                            <td>{{$list->value}}</td>
                            <td>
                                <a href="{{url('Admin/manage_coupon/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                                <a href="{{url('Admin/coupon/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
