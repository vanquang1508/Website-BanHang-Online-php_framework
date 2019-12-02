@extends('Admin.layouts.main')
@section('title','Show Order ')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mt-2">
            <div class=" row col-md-12">
                <h1 class="h3 mb-2 text-gray-800 col-md-12 ">Thông tin khách hàng</h1>
                <div class="col-md-6">
                    <p><span>Người đặt hàng: </span>{{$dataOrder->customer->first_name}} {{$dataOrder->customer->last_name}}</p>
                    <p><span>Ngày đặt hàng: </span>{{ date('d-m-Y', strtotime($dataOrder->transaction_data))}}</p>
                    <p><span>Địa chỉ bưu điện: </span>{{$dataOrder->customer->physical_address}}</p>
                </div>
                <div class="col-md-6">
                    <p><span>Email: </span>{{$dataOrder->customer->email}}</p>
                    <p><span>Địa chỉ khách hàng: </span>{{$dataOrder->customer->postal_address}}</p>
                    {{Form::model($data,['route' => ['brand.update',$data->id], 'method' => 'put' ])}}
                    {{Form::close()}}
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <h1 class="h3 mb-2 text-gray-800">Thông tin đơn hàng</h1>
                <table class="table table-hover">
                    <thead>
                    <tr role="row">
                        <th class="sorting " >STT</th>
                        <th class="sorting_asc">Tên sản phẩm</th>
                        <th class="sorting ">Số lượng</th>
                        <th class="sorting ">Giá tiền</th>
                        <th class="sorting ">Thành tiền</th>
                    </thead>
                    <tbody>
                @foreach($orderInfo as $key => $order)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ number_format($order->price) }} $</td>
                        <td>{{ number_format($order->sub_total) }} $</td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
                <tr>
                    <td><b>Tổng tiền:</b></td>
                    <td><b class="text-red">{{ number_format($dataOrder->total_amount) }} $</b></td>
                </tr>
            </div>
            <a href="{{route('order.index')}}" class="btn btn-outline-dark mt-4 mb-5 ml-1"><i class="fas fa-undo-alt"></i></a>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
