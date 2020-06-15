@extends('layouts.admin')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Comment</h4>

                        </div>
                        <div class="card-body">

                            {!! Form::model($comment,['method'=>'PATCH','action'=>['CommentController@update',$comment->id],'files'=>true]) !!}
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-12">


                                    <div class="form-group bmd-label-floating">
                                        {!! Form::label('body','Comment from  '.$comment->name) !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                    @if ($errors->has('body'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @endif


                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Update Comment ',['class'=>'btn btn-primary pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            @if(count($comment->replies)>0)
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Replies</h4>
                        </div>
                        <div class="card-body">
                             <table class="table table-default">
                                 <thead>
                                   <tr>
                                     <th>Name</th>
                                     <th>Reply</th>
                                   </tr>
                                 </thead>
                                 @foreach($comment->replies as $rep)
                                 <tbody>
                                   <tr>
                                       {!! Form::model($rep,['method'=>'PATCH','action'=>['CommentReplyController@update',$rep->id]]) !!}

                                       <td>{{$rep->name}}</td>
                                     <td>
                                     <div class="form-group">

                                         {!! Form::text('body',null,['class'=>'form-control']) !!}
                                     </div>

                                     </td>
                                       <td>

                                           <button  class="bg-transparent border-dark ml-2"><i
                                                       class="fa fa-edit text-success"></i></button>


                                           {!! Form::close() !!}


                                       </td>
                                       <td>


                                           {!! Form::open(['method'=>'DELETE','action'=>['CommentReplyController@destroy',$rep->id]]) !!}

                                           <button  class="bg-transparent border-dark"><i
                                                       class="fa fa-trash text-danger"></i></button>

                                           {!! Form::close() !!}
                                       </td>

                                   </tr>

                                 </tbody>
                                     @endforeach
                               </table>



                        </div>


                    </div>
                </div>
                @else
                <h1> No replies for this comment</h1>
            @endif
        </div>
    </div>



@stop
