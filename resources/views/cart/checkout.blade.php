@extends('layouts.admin')
@section('content')


    {!! Form::open(['method'=>'POST','action'=>'OrderController@store']) !!}


    <h1 class="m-5 text-center text-info text-uppercase">Checkout information</h1>
    <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-success ml-5">Billing Details</h2>
            <div class="p-3 p-lg-5 border-grey">
                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::label('shipping_fullname','Full Name') !!}
                        {!! Form::text('shipping_fullname',null,['class'=>'form-control']) !!}
                        @if ($errors->has('shipping_fullname'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_fullname') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::label('shipping_state','State/Country ') !!}
                        {!! Form::text('shipping_state',null,['class'=>'form-control']) !!}
                        @if ($errors->has('shipping_state'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_state') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('shipping_city','City ') !!}
                        {!! Form::text('shipping_city',null,['class'=>'form-control']) !!}
                        @if ($errors->has('shipping_city'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_city') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        {!! Form::label('shipping_zip','Postal/Zip ') !!}
                        {!! Form::text('shipping_zip',null,['class'=>'form-control']) !!}
                        @if ($errors->has('shipping_zip'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_zip') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        {!! Form::label('shipping_address','Address ') !!}
                        {!! Form::text ('shipping_address',null,['class'=>'form-control']) !!}
                        @if ($errors->has('shipping_address'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        {!! Form::label('shipping_phone','Phone # ') !!}
                        {!! Form::text('shipping_phone',null,['class'=>'form-control']) !!}
                        @if ($errors->has('shipping_phone'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-12">
                        <p class="text-gray"> Payment Method</p>
                        {!! Form::checkbox('payment_method',null,['class'=>'form-control']) !!}
                        {!! Form::label('payment_method','Cash on Delivery ') !!}

                        @if ($errors->has('payment_method'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                {{--            <div class="form-group">--}}
                {{--                <div class="col-md-12">--}}
                {{--                    {!! Form::label('notes','Order Notes ') !!}--}}
                {{--                    {!! Form::textarea('notes',null,['class'=>'form-control']) !!}--}}
                {{--                </div>--}}
                {{--            </div>--}}

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
                    <h2 class="h3 mb-3 text-primary">Your Order</h2>
                    <div class="p-3 p-lg-5 ">
                        <table class="table site-block-order-table mb-5">
                            <thead>
                            <th>Medicines</th>
                            <th>Total</th>
                            </thead>
                            <tbody>
                            @foreach($cart as $cart)
                            <tr>
                                <td>{{$cart->name}} <strong class="mx-2">x</strong> {{$cart->quantity}}</td>
                                <td>{{$cart->price*$cart->quantity}} PKR</td>
                            </tr>
                                @endforeach
                            <tr>
                                <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                <td class="text-black">{{\Cart::session(auth()->id())->getSubTotal()}} PKR</td>
                            </tr>
                            <tr>
                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                <td class="text-black font-weight-bold"><strong>{{\Cart::session(auth()->id())->getTotal()}} PKR</strong></td>
                            </tr>
                            </tbody>
                        </table>



                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block">
                                Place
                                Order
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- </form> -->



    {!! Form::close() !!}

@stop
