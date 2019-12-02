@extends('Client.layouts.main')
@section('content')
    <section class="main clearfix row" >
        <div class="col-md-12 mt-5">
            <br>
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center ">Thông tin tài khoản</h3>
                </div>
                <div class="card-body">
                    <p>Email: {{$data->email}}</p>
                    <p>Họ và tên: {{$data->first_name}} {{$data->last_name}}</p>
                    <p>Địa chỉ bưu điện: {{$data->postal_address}}</p>
                    <p>Địa chỉ khách hàng: {{$data->physical_address}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('customerInfo.edit',$data->id)}}" class="ml-1 mr-1 float-left">Thay đổi</a>
                </div>
            </div>
        </div>
    </section><!-- end main -->
@endsection
