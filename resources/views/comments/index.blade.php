@extends('layouts.admin')
@section('content')
    @if(count($comment)>0)
        <div class="content">
            <div class="container-fluid">
                <div>
                    <h1 class="text-info">
                        <center><b>Comments of Customers</b></center>
                    </h1>
                </div>
                <div class="card-body">


                    <div class="row">

                        <div class="col-md-8 col-lg-13">

                                @foreach($comment as $comm)

                                    <div class="card card-chart">
                                        <div class="card-header card-header-primary">
                                            From {{$comm->name}}   {{$comm->created_at->diffForHumans()}}
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                {{$comm->body}}
                                            </h4>

                                        </div>
                                        <div class="card-footer">
                                            <div class="form-inline pull-right">
                                                <a href="{{route('comments.edit',$comm->id)}}">
                                                    <button class="bg-transparent border-dark"><i
                                                                class="fa fa-edit text-success"></i></button>
                                                </a>


                                               {!! Form::open(['method'=>'DELETE','action'=>['CommentController@destroy',$comm->id]]) !!}



                                                    <button class="bg-transparent border-dark ml-2"><i
                                                                class="fa fa-trash text-danger"></i></button>
                                                {!! Form::close() !!}

                                            </div>
                                        </div>


                                    </div>
                                @endforeach


                        </div>


                    </div>
                </div>
            </div>
        </div>
        @else
        <h2>No Comments are there</h2>

    @endif
@stop
