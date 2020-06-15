@extends('layouts.admin')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title h3 text-center">Edit Inventory<br>
                            <small>{{$inventory->medicine->name}}</small></h4>

                        </div>
                        <div class="card-body">

                            {!! Form::model($inventory,['method'=>'PATCH','action'=>['InventoryController@update',$inventory->id],'files'=>true]) !!}
                            {{csrf_field()}}


                            <div class="form-group">
                                <div class="col-md-12">
                                    {!! Form::label('available_quantity','Available Quantity') !!}
                                    {!! Form::text('available_quantity',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('available_quantity'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('available_quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('sold_quantity','Sold Quantity ') !!}
                                    {!! Form::text('sold_quantity',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('sold_quantity'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('sold_quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                {!! Form::submit('Update Inventory ',['class'=>'btn btn-danger pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


@stop
