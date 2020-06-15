@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div>
                <h1 class="text-danger">
                    <center><b>Medicines</b></center>
                </h1>

                @if(Auth::user()->role->name=='admin' || Auth::user()->role->name=='staff')


                    {!! Form::open(['method'=>'GET','action'=>'MedicineController@create']) !!}

                    <div class="form-group">
                        {!! Form::submit('Add New',['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                @endif

                <p class="text-white">Click on any medicine to go through the details for that particular medicine </p>
            </div>

            <div class="card-body">

                <div class="row">
                    @foreach($med as $medd)

                        <div class="col-xl-6 col-lg-12">

                            <a href="{{route('medicine.show', $medd->id)}}">
                                <div class="card">
                                    <div class="card-header card-header-warning">
                                        <h3>{{$medd->name}}<br>
                                        </h3>
                                    </div>

                                    <div class="card-body">
                                        <center><img height="250"
                                                     src="{{ asset($medd->image ? 'images/'.$medd->image->path : 'https://placehold.it/400x400')}}"/>
                                        </center>
                                    </div>

                                    @if(Auth::user()->role->name=='admin' || Auth::user()->role->name=='staff')


                                        <div class="card-footer text-white">
                                            <div class="form-inline text-center">

                                                {!! Form::open(['method'=>'GET','action'=>['MedicineController@edit',$medd->id]]) !!}

                                                <div class="form-group">
                                                    {!! Form::submit('Edit',['class'=>'btn btn-info ']) !!}
                                                </div>
                                                {!! Form::close() !!}

                                                {!! Form::open(['method'=>'DELETE','action'=>['MedicineController@destroy',$medd->id]]) !!}

                                                <div class="form-group ml-1">
                                                    {!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endif


                                </div>

                            </a>
                        </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>




@stop
