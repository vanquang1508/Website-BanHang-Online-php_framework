@extends('Admin.layouts.main')
@section('title','Danh sách nhà sản xuất')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách nhà sản xuất</h1>
        @if(Session::has('thongbao'))
            <div id="mydiv" style="position:absolute; right: 10px; top: 100px;" class="float-right mt-2 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;">
                <strong>{{ Session::get('thongbao') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <p class="mb-4">
            <a href="{{route('brand.create')}}" class="btn btn-outline-secondary btn-sm">Thêm mới <i class="fas fa-plus"></i></a>
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
                            <th>Tên nhà sản xuất</th>
                            <th>Mô tả</th>
                            <th>Công cụ</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach($brands as $key => $data)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            {{  substr(strip_tags($data->description), 0, 50)."..." }}
                                        </td>
                                        <td>
                                            <a href="{{route('brand.edit',$data->id)}}" class="ml-1 mr-1 float-left"><i class="far fa-edit"></i></a>
                                            {{-- <a href="" class="float-left"><i class="fas fa-info-circle"></i></a>--}}
                                            {{Form::open(['route' => ['brand.destroy', $data->id], 'method' => 'DELETE'])}}
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
