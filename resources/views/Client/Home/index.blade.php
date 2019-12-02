@extends('Client.layouts.main')
@section('content')
    @if($data->count() > 0)
        <section class="main clearfix row" >
            @if(Session::has('thongbao'))
                <div id="mydiv" style="position:absolute; right: 10px; top: 50px; z-index:1000;" class="float-right ml-2 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;">
                    <strong>{{ Session::get('thongbao') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-columns">
            @foreach($data as $key=>$product)
                <div class=" card mt-3 mr-3">
                    <a href="{{asset('product/show/'.$product->id)}}"><img class="media mt-2" src={{asset('Upload/Product/'.$product->image)}} /></a>
                    <div class="card-body text-center">
                        <p class="h5">{{ $product->product_name }}</p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="h6 mt-3">{{ number_format($product->price )}} $</p>
                            </div>
                            <div class="col-md-6">
                                <a href="{{asset('cart/add/'.$product->id)}}" class="btn btn-fefault"><i class="fas fa-cart-plus fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </section><!-- end main -->
    @else
        <section class="main clearfix row" >
            <h5 class="mt-5">Không có sản phẩm</h5>
        </section><!-- end main -->
    @endif

@endsection
