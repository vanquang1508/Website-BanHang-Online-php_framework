@extends('Admin.layouts.main')
@section('title','Create Product')
@section('content')
    <!-- Begin Page Content -->
    {{Form::open(['url'=>'admin/order', 'method'=>'post'])}}
    <div class="container">
        <h3>Information Product</h3>
        <div class="form-group">
            {{Form::label('Transaction date:')}}
            {{Form::date('transaction_date','',['class'=>'form-control'])}}

        </div>
        <div class="form-group">
            {{Form::label('Customer:')}}
            {{Form::select('customer_id',$customer,null,['class' => " form-control"])}}
        </div>
        <div class="form-group">
            <label>Product</label>
            {!!Form::select('products[]',$products,null,['class' => " form-control js-example js-example-basic-multiple",'multiple','id'=> 'tags'])!!}
        </div>
        <div class="form-group">
            {{Form::label('Status:')}}
            {{Form::text('status','',['class'=>'form-control'])}}

        </div>
        <div class="form-group">
            {{Form::label('Total amount:')}}
            {{Form::text('total_amount','',['class'=>'form-control'])}}

        </div>
        <div class="form-group">
            {{Form::submit('Save',['class'=>'btn btn-info'])}}
            <a href="{{route('order.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>
        </div>
    </div>
    {{Form::close()}}
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
