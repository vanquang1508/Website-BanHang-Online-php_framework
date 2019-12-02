@extends('Admin.layouts.main')
@section('title','Trang chủ')
@section('content')
<div class="container">
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="{{route("order.index")}}">Đơn hàng</a> </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countOrder}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="{{route("order.index")}}">Đơn hàng chưa giao</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countOrderStatus}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="{{route("customer.index")}}">Khách hàng</a></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countCustomer}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-user-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($sumTotalAmount,0,',','.')}} $</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="col-md-6 mt-2 mb-4 font-weight-normal ">
            {!!$pie->html() !!}
        </div>
        <div class="col-md-6 mt-2 mb-4 font-weight-normal ">
            {!!$pieBrand->html() !!}
        </div>
        <div class="col-md-12 mb-4 font-weight-normal font-italic card">
            {!! $chart->html() !!}
        </div>
    </div>
</div>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
{!! $pie->script() !!}
{!! $pieBrand->script() !!}
@endsection
@section('script')
    @include('Admin.shared.scrip')

@endsection
