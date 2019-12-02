@extends('Admin.layouts.main')
@section('title','Cập nhật sản phẩm')
@section('content')
    <!-- Begin Page Content -->
    {{Form::model($data,['route' => ['product.update',$data->id], 'method' => 'put','files'=>true ])}}
    <div class="container">
        <h3>Cập nhật thông tin sản phẩm</h3>
        <div class="row">
            <div class="form-group col-md-3">
                {{Form::label('Tên sản phẩm:')}}
                {{Form::text('product_name',$data->product_name,['class'=>'form-control'])}}
                @if ($errors->has('product_name'))
                    <div class="text-danger">{{ $errors->first('product_name') }}</div>
                @endif
            </div>
            <div class="form-group col-md-2">
                {{Form::label('Giá:')}}
                {{Form::number('price',$data->price,['class'=>'form-control'])}}
                @if ($errors->has('price'))
                    <div class="text-danger">{{ $errors->first('price') }}</div>
                @endif
            </div>
            <div class="form-group col-md-3">
                {{Form::label('Chi nhánh:')}}
                {{Form::select('brand_id',$brand,$data->brand_id,['class' => " form-control"])}}
                @if ($errors->has('brand_id'))
                    <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                @endif
            </div>
            <div class="form-group col-md-3">
                {{Form::label('Thể loại:')}}
                {{Form::select('category_id',$category,$data->category_id,['class' => " form-control"])}}
                @if ($errors->has('category_id'))
                    <div class="text-danger">{{ $errors->first('category_id') }}</div>
                @endif
            </div>
            <div class="form-group col-md-6">
                {{Form::label('Mô tả:')}}
                {{Form::textarea('description',$data->description,['class'=>'form-control'])}}
                @if ($errors->has('description'))
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="row col-md-6">
                <div class="form-group col-md-12">
                    {{Form::label('Image sản phẩm:')}} <br/>
                    {{Form::file('image',null,['class' => " form-control"])}}
                </div>
                <div class="form-group col-md-12">
                    <img width="200px" height="200px" class="rounded-0" src={{asset('Upload/Product/'.$data->image)}}>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{Form::submit('Lưu',['class'=>'btn btn-outline-info'])}}
            <a href="{{route('product.index')}}" class="btn btn-outline-dark">Quay lại</a>
        </div>
    </div>
    {{Form::close()}}
<!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
