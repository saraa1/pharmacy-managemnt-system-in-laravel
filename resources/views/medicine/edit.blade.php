@extends('layouts.admin')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Medicines</h4>

                        </div>
                        <div class="card-body">

                            {!! Form::model($med,['method'=>'PATCH','action'=>['MedicineController@update',$med->id],'files'=>true]) !!}
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('name','Name') !!}
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating ">
                                        {!! Form::label('medicine_type_id','Medicine Type') !!}
                                        {!! Form::select('medicine_type_id',[''=>'Select one']+$medtype,null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('medicine_type_id'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('medicine_type_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-label-floating  " style="margin-top: 1rem">
                                        {!! Form::label('description','Description') !!}
                                        {!! Form::textarea('description',null,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                    @if ($errors->has('description'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top: 1rem">
                                        {!! Form::label('grams','Grams') !!}
                                        {!! Form::text('grams',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('grams'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('grams') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top: 1rem">
                                        {!! Form::label('price','Price/med') !!}
                                        {!! Form::text('price',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('price'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="margin-top: 1rem">
                                        {!! Form::label('quantity','Quantity') !!}
                                        {!! Form::text('quantity',null,['class'=>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('quantity'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::label('Choose Picture','') !!}
                                    {!! Form::file('image_id') !!}
                                </div>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <input type="hidden" name="role_id" value="1">--}}
                            {{--                            </div>--}}


                            <div class="form-group">
                                {!! Form::submit('Update Medicine ',['class'=>'btn btn-primary pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="border border-dark text-center">
                            <img height="400" width="300" class="p-3"
                                 src="{{asset($med->image ? 'images/'.$med->image->path : 'https://placehold.it/600x600')}}"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
