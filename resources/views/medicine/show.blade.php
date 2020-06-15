@extends('layouts.admin')
@section('content')



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h2 class="card-title text-center">{{$med->name}}, {{$med->grams}}</h2>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-info h4"><b>Description: </b></p>
                                    <p class="text-white ml-4 " style="font-size:large">{{$med->description}}</p>
                                    <p class="text-info h4"><b>Price: </b></p>
                                    <p><strong class="text-white h4 ml-4"> {{$med->price}} PKR</strong></p>

                                </div>
{{--                                <div class="m-3">--}}
{{--                                    <div class="input-group mb-3">--}}
{{--                                        <p class="text-info h4"><b>Quantity: </b></p>--}}


{{--                                            <button class="btn btn-outline-info ml-4" id="subtract" type="button">&minus;--}}
{{--                                            </button>--}}

{{--                                            <input type="text" name="quantity" value=1 class="form-control text-center" style="width: 70px">--}}

{{--                                            <button class="btn btn-outline-primary text-center" id="add" type="button">--}}
{{--                                                &plus;--}}
{{--                                            </button>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="card-footer">

                            {!! Form::open(['method'=>'GET','action'=>['CartController@add_to_cart',$med->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Add to Cart ',['class'=>'btn btn-danger pull-right']) !!}
                            </div>
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

