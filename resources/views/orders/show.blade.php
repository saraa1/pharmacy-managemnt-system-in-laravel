@extends('layouts.admin')
@section('content')

    <h1 class="m-5 text-center text-info text-uppercase">View Order Details</h1>
    <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
            <div class="card ml-2">
                <div class="card-header card-header-success text-center">
                    <h2 class="">Order Details</h2>
                </div>
                <div class="card-body ml-4 ">

                    <div class="form-group ">
                        <p class="h4 "> Customer
                            Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->shipping_fullname}} </p>
                        <p class="h4">Customer
                            Address:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->shipping_address}}</p>
                        <p class="h4">Customer
                            Zip:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$order->shipping_zipcode}}</p>
                        <p class="h4">Customer
                            City:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->shipping_city}}</p>
                        <p class="h4">Customer
                            Country:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->shipping_state}}</p>
                        <p class="h4">Customer
                            Phone#:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->shipping_phone}}</p>
                        <p class="h4">Payment
                            Method:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->payment_method}}</p>
                        <p class="h4">Payment
                            Status:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            @if($order->is_paid==0)
                                Not Paid
                            @else
                                Paid
                            @endif</p>
                        <p class="h4">Order
                            Status:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->status}}</p>

                        <p class="h4">Order
                            Notes:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->notes ? $order->notes : 'No notes'}}</p>
                        <p class="h4">Total Items:
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->item_count}}</p>

                        <p class="h4">Grand
                            Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$order->grand_total}}</p>

                    </div>
                </div>
                <div class="card-footer">


                    {!! Form::open(['method'=>'GET','action'=>'OrderController@index']) !!}
                    <div class="form-group">
                        {!! Form::submit('Back',['class'=>'btn btn-success ']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
        <div class="col-md-6">

            {{--            <div class="row mb-5">--}}
            {{--                <div class="col-md-12">--}}
            {{--                    <h2 class="h3 mb-3 text-info">Coupon Code</h2>--}}
            {{--                    <div class="p-3 p-lg-5 border">--}}

            {{--                        <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>--}}
            {{--                        <div class="input-group w-75">--}}
            {{--                            <input type="text" class="form-control" id="c_code" placeholder="Coupon Code"--}}
            {{--                                   aria-label="Coupon Code"--}}
            {{--                                   aria-describedby="button-addon2">--}}
            {{--                            <div class="input-group-append">--}}
            {{--                                <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply--}}
            {{--                                </button>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card ml-2">
                        <div class="card-header card-header-primary text-center">
                            <h2 class="">Order Items Details</h2>
                        </div>

                        <div class="p-3 p-lg-5 ">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                <th>Medicines</th>
                                <th>Price</th>
                                <th>Total</th>
                                </thead>
                                <tbody>
                                @php($total=0)
                                @foreach($orderitems as $item)



                                    <tr>
                                        <td>{{$item->name}} <strong class="mx-2">x</strong> {{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->price*$item->quantity}}</td>
                                    </tr>
                                    <tr><br></tr>




                                @endforeach


                                <tr >
                                    <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                    <td class="text-black">{{$order->grand_total}} PKR</td>
                                </tr>

                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold">
                                        <strong>{{$order->grand_total}} PKR</strong></td>
                                </tr>




                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- </form> -->









    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">

                </div>
            </div>
        </div>
    </div>

@stop