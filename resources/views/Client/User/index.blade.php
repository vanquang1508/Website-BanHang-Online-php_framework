@extends('Client.layouts.main')
@section('content')
    <section class="main clearfix row" >
        @if(Session::has('thongbao'))
            <div id="mydiv" style="position:absolute; right: 10px; top: 100px; z-index:1000;" class="float-right ml-2 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute;">
                <strong>{{ Session::get('thongbao') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{Form::open(['url'=>'user ', 'method'=>'post','class'=>'col-md-12 row mt-5'])}}
            <h3 class="text-center col-md-12 mt-5 mb-3">Đăng ký tài khoản </h3>
            <hr/>
            <div class="col-md-4">
                <div class="form-group">
                    {{Form::label('Email:')}}
                    {{Form::email('email','',['class'=>'form-control'])}}
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('Mật khẩu:')}}
                    {{Form::password('password',['class'=>'form-control'])}}
                    @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-md-8 row">
                <div class="form-group col-md-6">
                    {{Form::label('Họ (lót):')}}
                    {{Form::text('first_name','',['class'=>'form-control'])}}
                    @if ($errors->has('first_name'))
                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('Tên:')}}
                    {{Form::text('last_name','',['class'=>'form-control'])}}
                    @if ($errors->has('last_name'))
                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    {{Form::label('Địa Chỉ Bưu Điện:')}}
                    {{Form::text('postal_address','',['class'=>'form-control'])}}
                    @if ($errors->has('postal_address'))
                        <div class="text-danger">{{ $errors->first('postal_address') }}</div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('Địa Chỉ Khách Hàng:')}}
                    {{Form::text('physical_address','',['class'=>'form-control'])}}
                    @if ($errors->has('physical_address'))
                        <div class="text-danger">{{ $errors->first('physical_address') }}</div>
                    @endif
                </div>
            </div>
            {{Form::submit('Đăng kí',['class'=>'btn btn-outline-info col-md-12 mt-3 '])}}
         {{Form::close()}}

    </section><!-- end main -->
@endsection
