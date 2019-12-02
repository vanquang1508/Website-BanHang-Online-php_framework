@extends('Client.layouts.main')
@section('content')
    <script type="text/javascript">
        function updateCart(qty,rowId) {
            $.get(
                '{{asset('cart/update')}}',
                {qty:qty,rowId:rowId},
                function () {
                    location.reload();
                }
            );
        }
    </script>
    <section class="main row">
                @if(Cart::count()>0)
                <div class="col-md-12" style="min-height: 500px">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-5 col-md-12">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                        </ol>
                    </nav>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td class="text-center">STT</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>
                                <td class="text-center">Số lượng</td>
                                <td>Thành tiền</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            <p hidden>{{$key=1}}</p>
                            @foreach($items as  $item)
                                <tr>
                                    <td class="text-center">{{$key++}}</td>
                                    <td >
                                        <img width="70px" height="70px" class="card" src={{asset('Upload/Product/'.$item->options->image)}}>
                                    </td>
                                    <td class="m-md-auto">
                                        <h4>{{$item->name}}</h4>
                                    </td>
                                    <td>
                                        <p>{{number_format($item->price,0,',','.')}} $</p>
                                    </td>
                                    <td class="text-center">
                                        <input class="text-center" type="text" name="quantity" value='{{$item->qty}}' size="2" onchange="updateCart(this.value,'{{$item->rowId}}')">
                                    </td>
                                    <td>
                                        <p>
                                            {{number_format($item->price*$item->qty,0,',','.')}} $
                                        </p>
                                    </td>
                                    <td>
                                        <a href="{{asset('cart/delete/'.$item->rowId)}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h3>Tổng đơn hàng: {{$total}} $ <a href="{{asset('cart/delete/all')}}"><i class="fas fa-trash"></i></a></h3>
                    </div>
                    <a href="{{url('cart/thanhToanCart')}}" class="btn btn-outline-primary mb-5">Đặt hàng</a>
                </div>

                @else
                    <h3 class="mt-5">Giỏ hàng rỗng</h3>
                @endif
    </section>
@endsection
