@extends('Client.layouts.main')
@section('content')
    <section class="main clearfix row" >
        <div class="col-md-12 mt-5">

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center ">Cập nhật thông tin tài khoản</h3>
                </div>
                <div class="card-body">
                    {{Form::model($data,['route' => ['customerInfo.update',$data->id], 'method' => 'put'])}}
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{Form::label('Họ:')}}
                                    {{Form::text('first_name',$data->name,['class'=>'form-control'])}}
                                    @if ($errors->has('first_name'))
                                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('Tên:')}}
                                    {{Form::text('last_name',$data->description,['class'=>'form-control'])}}
                                    @if ($errors->has('last_name'))
                                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('Email:')}}
                                    {{Form::email('email',$data->name,['class'=>'form-control'])}}
                                    @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('Địa Chỉ Bưu Điện:')}}
                                    {{Form::text('postal_address',$data->name,['class'=>'form-control'])}}
                                    @if ($errors->has('postal_address'))
                                        <div class="text-danger">{{ $errors->first('postal_address') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('Địa Chỉ Khách Hàng:')}}
                                    {{Form::text('physical_address',$data->name,['class'=>'form-control'])}}
                                    @if ($errors->has('physical_address'))
                                        <div class="text-danger">{{ $errors->first('physical_address') }}</div>
                                    @endif
                                </div>
                                <input hidden name="password" value="{{$data->password}}">
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    {{Form::submit('Cập nhật',['class'=>'btn btn-outline-info'])}}
                </div>
                {{Form::close()}}
            </div>
        </div>
    </section><!-- end main -->
@endsection
