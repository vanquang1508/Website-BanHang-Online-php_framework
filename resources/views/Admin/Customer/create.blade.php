@extends('Admin.layouts.main')
@section('title','Thêm khách hàng')
@section('content')
    <!-- Begin Page Content -->
    {{Form::open(['url'=>'admin/customer', 'method'=>'post'])}}
    <div class="container mt-5">
        <h3>Thêm mới khách hàng</h3>
        <div class="row col-md-12">
            <div class="form-group col-md-6">
                {{Form::label('Họ:')}}
                {{Form::text('first_name','',['class'=>'form-control'])}}
                @if ($errors->has('first_name'))
                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                @endif

            </div>
            <div class="form-group col-md-6">
                {{Form::label('Tên:')}}
                {{Form::text('last_name','',['class'=>'form-control'])}}
                @if ($errors->has('last_name'))
                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                @endif
            </div>
            <div class="form-group col-md-6">
                {{Form::label('Email:')}}
                {{Form::email('email','',['class'=>'form-control'])}}
                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group col-md-6">
                {{Form::label('Địa Chỉ Bưu Điện:')}}
                {{Form::text('postal_address','',['class'=>'form-control'])}}
                @if ($errors->has('postal_address'))
                    <div class="text-danger">{{ $errors->first('postal_address') }}</div>
                @endif
            </div>
            <div class="form-group col-md-6">
                {{Form::label('Địa Chỉ Khách Hàng:')}}
                {{Form::text('physical_address','',['class'=>'form-control'])}}
                @if ($errors->has('physical_address'))
                    <div class="text-danger">{{ $errors->first('physical_address') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group">
            {{Form::submit('Lưu',['class'=>'btn btn-outline-info'])}}
            <a href="{{route('customer.index')}}" class="btn btn-outline-dark"><i class="fas fa-undo-alt"></i></a>
        </div>
    </div>
    {{Form::close()}}
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
