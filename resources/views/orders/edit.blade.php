@extends('layouts.admin')
@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title h3 text-center">Edit Order</h4>

                        </div>
                        <div class="card-body">

                            {!! Form::model($order,['method'=>'PATCH','action'=>['OrderController@update',$order->id],'files'=>true]) !!}
                            {{csrf_field()}}

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
                                    {!! Form::label('shipping_zipcode','Postal/Zip ') !!}
                                    {!! Form::text('shipping_zipcode',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('shipping_zipcode'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('shipping_zipcode') }}</strong>
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
                                    {!! Form::label('is_paid','Payment Status ') !!}
                                    {!! Form::select('is_paid',[1=>'Paid',0=>'Not Paid'],null,['class'=>'form-control']) !!}
                                    @if ($errors->has('is_paid'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('is_paid') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('status','Order Status ') !!}
                                    {!! Form::select('status',['pending'=>'Pending','completed'=>'Completed'],null,['class'=>'form-control']) !!}
                                    @if ($errors->has('status'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    {!! Form::label('grand_total','Total Price ') !!}
                                    {!! Form::text('grand_total',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('grand_total'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('grand_total') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('item_count','Total Items ') !!}
                                    {!! Form::text('item_count',null,['class'=>'form-control']) !!}
                                    @if ($errors->has('item_count'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('item_count') }}</strong>
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
                            <div class="form-group">
                                <input type="hidden" name="order_number" value="{{$order->order_number}}">
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Update Order ',['class'=>'btn btn-danger pull-right']) !!}
                            </div>

                            <div class="clearfix"></div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>


                    <div class="col-md-4">
                        <div class="card ml-2">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="">Order Items Details</h4>
                            </div>

                            <div class="p-3 ">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <th>Medicines</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    </thead>
                                    <tbody>

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


@stop
