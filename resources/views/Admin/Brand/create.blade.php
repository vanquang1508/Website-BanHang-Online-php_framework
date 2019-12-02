@extends('Admin.layouts.main')
@section('title','Thêm nhà sản xuất')
@section('content')
    <!-- Begin Page Content -->
    {{Form::open(['url'=>'admin/brand', 'method'=>'post'])}}
    <div class="container">
        <h3>Thêm mới nhà sản xuất</h3>
        <div class="form-group">
            {{Form::label('Tên nhà sản xuất:')}}
            {{Form::text('name','',['class'=>'form-control'])}}
        </div>
        @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
        <div class="form-group">
            {{Form::label('Mô tả (*):')}}
            {{Form::textarea ('description','',['class'=>'form-control'])}}
        </div>
        @if ($errors->has('description'))
            <div class="text-danger mb-3">{{ $errors->first('description') }}</div>
        @endif
        <div class="form-group">
            {{Form::submit('Lưu',['class'=>'btn btn-outline-info '])}}
            <a href="{{route('brand.index')}}" class="btn btn-outline-dark"><i class="fas fa-undo-alt"></i></a>
        </div>
    </div>
    {{Form::close()}}
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
