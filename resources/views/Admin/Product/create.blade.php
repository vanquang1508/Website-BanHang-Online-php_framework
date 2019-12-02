@extends('Admin.layouts.main')
@section('title','Thêm sản phẩm')
@section('content')
    <!-- Begin Page Content -->
    {{Form::open(['url'=>'admin/product', 'method'=>'post','files'=>true])}}
    <div class="container">
        <h3>Thêm mới sản phẩm</h3>
        <div class="row">
            <div class="form-group col-md-3">
                {{Form::label('Tên sản phẩm:')}}
                {{Form::text('product_name','',['class'=>'form-control'])}}
                @if ($errors->has('product_name'))
                    <div class="text-danger">{{ $errors->first('product_name') }}</div>
                @endif
            </div>
            <div class="form-group col-md-2">
                {{Form::label('Giá ($):')}}
                {{Form::number('price','',['class'=>'form-control'])}}
                @if ($errors->has('price'))
                    <div class="text-danger">{{ $errors->first('price') }}</div>
                @endif
            </div>

            <div class="form-group col-md-3">
                {{Form::label('Nhà sản xuất:')}}
                {{Form::select('brand_id',$brand,null,['class' => " form-control",'placeholder'=>'Chọn nhà sản xuất'])}}
                @if ($errors->has('brand_id'))
                    <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                @endif
            </div>
            <div class="form-group col-md-3">
                {{Form::label('Thể loại:')}}
                {{Form::select('category_id',$category,null,['class' => " form-control",'placeholder'=>'Chọn thể loại'])}}
                @if ($errors->has('category_id'))
                    <div class="text-danger">{{ $errors->first('category_id') }}</div>
                @endif
            </div>

            <div class="form-group col-md-6">
                {{Form::label('Mô tả:')}}
                {{Form::textarea('description','',['class'=>'form-control'])}}
                @if ($errors->has('description'))
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="form-group col-md-6">
                {{Form::label('Image sản phẩm:')}} <br/>
                {{Form::file('image',null,['class' => " form-control"])}}
                <img src="" id="myImage">
                @if ($errors->has('image'))
                    <div class="text-danger">{{ $errors->first('image') }}</div>
                @endif
            </div>
        </div>
        <div class="form-group">
            {{Form::submit('Lưu',['class'=>'btn btn-outline-info'])}}
            <a href="{{route('product.index')}}" class="btn btn-outline-dark"><i class="fas fa-undo-alt"></i></a>
        </div>
    </div>
    {{Form::close()}}
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
