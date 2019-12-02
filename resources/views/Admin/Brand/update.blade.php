@extends('Admin.layouts.main')
@section('title','Cập nhật chi nhánh')
@section('content')
    <!-- Begin Page Content -->
    {{Form::model($data,['route' => ['brand.update',$data->id], 'method' => 'put' ])}}
    <div class="container">
        <h3>Cập nhật nhà sản xuất</h3>
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="form-group">
            {{Form::label('Tên nhà sản xuất:')}}
            {{Form::text('name',$data->name,['class'=>'form-control'])}}
        </div>
        @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
        <div class="form-group">
            {{Form::label('Mô tả:')}}
            {{Form::textarea('description',$data->description,['class'=>'form-control'])}}
        </div>
        @if ($errors->has('description'))
            <div class="text-danger mb-3">{{ $errors->first('description') }}</div>
        @endif
        <div class="form-group">
            {{Form::submit('Lưu',['class'=>'btn btn-outline-info'])}}
            <a href="{{route('brand.index')}}" class="btn btn-outline-dark">Quay Lại</a>
        </div>
    </div>
    {{Form::close()}}
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
