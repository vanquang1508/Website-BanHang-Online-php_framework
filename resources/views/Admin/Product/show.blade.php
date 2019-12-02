@extends('Admin.layouts.main')
@section('title','Chi tiết sản phẩm')
@section('content')
    <div class="container">
        <h3>Thông tin sản phẩm </h3>
        <div class="row mt-4 mb-4">
            <div class="col-md-6">
                <img class="rounded-0 col-md-12 card" src={{asset('Upload/Product/'.$data->image)}}>
            </div>
            <div class="col-md-6">
                <p>Mã sản phẩm: {!! $data->product_code !!}</p>
                <p>Tên sản phẩm: {!! $data->product_name !!}</p>
                <p>Giá: {!! $data->price !!} $</p>
                <p>Nhà sản xuất: {!! $data->brand->name !!}</p>
                <p>Thể loại: {!! $data->category->name !!}</p>
                <p>Nội dung: {!! $data->description !!}</p>
            </div>
        </div>
        <a href="{{route('product.index')}}" class="btn btn-outline-dark mb-4"><i class="fas fa-undo-alt"></i></a>
    </div>
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
