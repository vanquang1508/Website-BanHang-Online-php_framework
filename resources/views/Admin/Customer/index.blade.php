@extends('Admin.layouts.main')
@section('title','Danh sách khách hàng')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách khách hàng</h1>
        @if(Session::has('thongbao'))
            <div id="mydiv" style="position:absolute; right: 10px; top: 100px;" class="float-right mt-2 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;">
                <strong>{{ Session::get('thongbao') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <p class="mb-4">
{{--            <a href="{{route('customer.create')}}" class="btn btn-outline-secondary btn-sm"> Thêm mới <i class="fas fa-plus"></i></a>--}}
        </p>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Địa chỉ bưu điện</th>
                            <th>Địa chỉ khách hàng</th>
                            <th>Công cụ</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach($customers as $key => $data)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{  substr(strip_tags($data->password), 0, 20)."..." }}</td>
                                        <td>{{$data->postal_address}}</td>
                                        <td>{{$data->physical_address}}</td>
                                        <td>
{{--                                            <a href="{{route('customer.edit',$data->id)}}" class="ml-1 mr-1 float-left"><i class="far fa-edit"></i></a>--}}
                                            {{--<a href="" class="float-left"><i class="fas fa-info-circle"></i></a>--}}
                                            {{Form::open(['route' => ['customer.destroy', $data->id], 'method' => 'DELETE'])}}
                                                {{ Form::button('<i class="fas  fa-trash"> </i>', ['type' => 'submit', 'class' => 'text-danger border-0 bg-white float-left'] )  }}
                                            {{ Form::close() }}

                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
