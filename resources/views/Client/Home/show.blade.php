@extends('Client.layouts.main')
@section('content')
        <section class="main clearfix row" >
            <div class="row mt-5">
                <div class="col-md-6 card">
                    <img class="media" src={{asset('Upload/Product/'.$data->image)}} />
                </div>
                <div class="col-md-6">
                    <h2 class="font-weight-bold">{{$data->product_name}}</h2>
                    <h4 class="ml-1">{{ number_format($data->price)}} <span class="text-danger">$</span></h4>
                    <ul class="ml-5">
                        <li> <p>Thể loại: {{$data->category->name}}</p></li>
                        <li> <p>Chi nhánh: {{$data->brand->name}}</p></li>
                    </ul>
                    <p class="col-md-10">{{$data->description}}</p>
                    <a href="{{asset('cart/add/'.$data->id)}}" class="btn btn-fefault"><i class="fas fa-cart-plus fa-2x"></i></a>
                </div>
            </div>
        </section><!-- end main -->
@endsection
