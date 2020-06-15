@extends('layouts.admin')
@section('content')


    @if(count($staff)>0)

        <div>
            <h1 class="text-success mt-5">
                <center><b>Staff Request</b><br></h1>
                    <h5 class="text-white ml-2 text-center">If you need to add staff member you need to make the status active. </h5></center>


        </div>
{{--        @if(Session::has('deleted_user'))--}}
{{--            <p class="bg-danger"> {{session('deleted_user')}} </p>--}}
{{--        @endif--}}

{{--        @if(Session::has('updated_user'))--}}
{{--            <p class="bg-primary"> {{session('updated_user')}} </p>--}}
{{--        @endif--}}

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning active">
                    <th class="text-warning">Sr No.</th>
                    <th class="text-warning">Name</th>
                    <th class="text-warning">Email</th>
                    <th class="text-warning">Role</th>
                    <th class="text-warning">
                        Status
                    </th>
                    <th class="text-warning">Created_at</th>
                    <th class="text-warning">Updated_at</th>
                    </thead>
                    @foreach($staff as $key=> $staff)
                        <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->email}}</td>
                            <td>{{$staff->role ? $staff->role->name : 'no role'}}</td>
                            <td>{{$staff->is_active==1 ? 'Active' :'Not Active' }}</td>

                            <td>{{$staff->created_at ? $staff->created_at->diffForHumans() : "no date"}}</td>
                            <td>{{$staff->updated_at ? $staff->updated_at->diffForHumans() : "no date"}}</td>
                           <td> @if($staff->is_active==1)

                                   {!! Form::model($staff,['method'=>'PATCH','action'=>['StaffController@update',$staff->id]]) !!}
                                   <input type="hidden" name="is_active" value="0">

                                   <div class="form-group">
                                       {!! Form::submit('Reject',['class'=>'btn btn-success']) !!}
                                   </div>
                                   {!! Form::close() !!}
                               @else
                                   {!! Form::model($staff,['method'=>'PATCH','action'=>['StaffController@update',$staff->id]]) !!}
                                   <input type="hidden" name="is_active" value="1">

                                   <div class="form-group">
                                       {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                                   </div>
                                   {!! Form::close() !!}


                               @endif
                           </td>

                            <td>
                                <a href="{{route('staff.edit',$staff->id)}}" style="color: white">
                                    <button class="btn btn-info">

                                        Edit

                                    </button>
                                </a>
                            </td>

{{--                            <td>--}}
{{--                                {!! Form::open(['method'=>'DELETE','action'=>['AdminPatientController@destroy',$patient->id]]) !!}--}}

{{--                                <div class="form-group">--}}
{{--                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}--}}
{{--                                </div>--}}
{{--                                {!! Form::close() !!}--}}
{{--                            </td>--}}
                        </tr>
                        @endforeach

                        </tbody>
                </table>
                @else
                    <div>
                        <h1 class="text-warning mt-5">
                            <center><b>
                                    No Staff Request found
                                </b></center>
                        </h1>
                    </div>

                @endif
            </div>
        </div>
@stop