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
        <div class="col-md-12 row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5 card">
                <h3 class="text-center mt-5">Đăng nhập</h3>
                {{Form::open(['url'=>'check', 'method'=>'post'])}}
                <div class="form-group m-auto">
                    {{Form::label('Email:')}}
                    {{Form::email('email','',['class'=>'form-control'])}}
                </div>
                <div class="form-group  m-auto">
                    {{Form::label('Mật khẩu:')}}
                    {{Form::password('password',['class'=>'form-control'])}}
                </div>
                {{Form::submit('Đăng nhập',['class'=>'btn btn-outline-info col-md-12 mt-3'])}}
                <a href="{{route('user.create')}}" class="btn btn-outline-secondary col-md-12 mt-3 mb-5"> Đăng kí </a>

                {{Form::close()}}
            </div>
            <div class="col-md-3"></div>
        </div>

    </section><!-- end main -->
@endsection
