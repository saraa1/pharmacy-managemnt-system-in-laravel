@extends('layouts.admin')
@section('scripts')

@stop
@section('content')

    @if(count($orders)>0)

        <div>
            <h1 class="text-danger mt-5 text-uppercase">
                <center><b>All Orders</b></center>
            </h1>
        </div>
{{--                @if(Session::has('deleted_user'))--}}
{{--                    <p class="bg-danger"> {{session('deleted_user')}} </p>--}}
{{--                @endif--}}

        {{--        @if(Session::has('updated_user'))--}}
        {{--            <p class="bg-primary"> {{session('updated_user')}} </p>--}}
        {{--        @endif--}}

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class=" ">

                    <th class="text-warning text-center">Order #</th>
                    <th class="text-warning">Customer</th>
                    <th class="text-warning">Order Status</th>
                    <th class=" text-warning">
                        Payment Method
                    </th>
                    <th class="text-warning">Payment Status</th>
                    <th class="text-warning">Total Items</th>
                    <th class="text-warning">Total Price</th>
                    <th class="text-primary">View</th>
                    <th class="text-success">Edit</th>

                    <th class="text-danger">Delete</th>

                    </thead>
                    <tbody>


                    @foreach($orders as  $order)
                        <tr>
                            <td>{{$order->order_number}}</td>
                            <td>{{$order->shipping_fullname}} </td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->payment_method}} </td>
                            <td>@if($order->is_paid==0)
                            Not Paid
                            @else
                            Paid
                            @endif</td>
                            <td>{{$order->item_count}} </td>
                            <td>{{$order->grand_total}} PKR </td>
                            <td>
                                <a href="{{route('order.show',$order->id)}}"><button class="bg-transparent"><i class="fa fa-eye text-primary"></i></button></a>
                            </td>

                            <td>
                                <a href="{{route('order.edit',$order->id)}}"><button class="bg-transparent"><i class="fa fa-edit text-success"></i></button></a>
                            </td>
                            <td>


                                {!! Form::open(['method'=>'DELETE','action'=>['OrderController@destroy',$order->id]]) !!}

                                <div class="form-group">
                                    <button class="bg-transparent">
                                        <i class="fa fa-trash text-danger"></i>
                                    </button>
                                </div>
                                {!! Form::close() !!}

{{--                                <a href="{{route('order.delete',$order->id)}}"></a>--}}



                            </td>



{{--                            <td>{{$order->shipping_address}} </td>--}}
{{--                            <td>{{$order->shipping_city}} </td>--}}
{{--                            <td>{{$order->shipping_state}} </td>--}}
{{--                            <td>{{$order->shipping_zipcode}} </td>--}}
{{--                            <td>{{$order->shipping_phone}} </td>--}}
{{--                            <td>{{$order->notes}} </td>--}}
{{--                            <td>{{$order->billing_fullname}} </td>--}}
{{--                            <td>{{$order->billing_address}} </td>--}}
{{--                            <td>{{$order->billing_city}} </td>--}}
{{--                            <td>{{$order->billing_state}} </td>--}}
{{--                            <td>{{$order->billing_zipcode}} </td>--}}
{{--                            <td>{{$order->billing_phone}} </td>--}}

{{--                            <td>--}}
{{--                                {!! Form::open(['method'=>'PATCH','action'=>['CartController@update',$orderitem->id]]) !!}--}}

{{--                                <div class="m-3">--}}
{{--                                    <div class="input-group mb-3">--}}
{{--                                        <input type="number" name="quantity" class="form-control text-center" style="width: 5px"  min="0" value='{{$orderitem->quantity}}' >--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}



                        </tr>

                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>

    @else
        <div>
            <h1 class="text-warning mt-5">
                <center><b>
                        No Orders
                    </b></center>
            </h1>
        </div>

    @endif


@stop