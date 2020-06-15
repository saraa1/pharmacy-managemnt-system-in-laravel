@extends('layouts.admin')
@section('content')

    @if(count($orderitems)>0)

        <div>
            <h1 class="text-danger mt-5 text-uppercase">
                <center><b>Your Cart</b></center>
            </h1>
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
                    <thead class="text-warning">
                    <th class="text-info">Sr No.</th>
                    <th class="text-info">Image</th>
                    <th class="text-info">Medicine</th>
                    <th class="text-info">Price</th>
                    <th class="text-center text-info">
                        Quantity
                    </th>
                    <th class="text-info">TotalPrice</th>
                    <th class="text-info">Save</th>
                    <th class="text-info">Delete</th>
                    </thead>
                    <tbody>


                    @foreach($orderitems as $key=> $orderitem)
                        <tr>


                            <td>{{$key}}</td>
                            <td><img height="150" src="{{asset('/images/'.$orderitem->attributes->image)}}"
                                     alt="product-thumbnail"></td>
                            <td>{{$orderitem->name}}</td>
                            <td>{{$orderitem->price}} PKR</td>
                            <td>
                                {!! Form::open(['method'=>'PATCH','action'=>['CartController@update',$orderitem->id]]) !!}

                                <div class="m-3">
                                    <div class="input-group mb-3">
                                        <input type="number" name="quantity" class="form-control text-center" style="width: 5px"  min="0" value='{{$orderitem->quantity}}' >

                                    </div>
                                </div>
                            </td>

                            <td>{{$orderitem->price*$orderitem->quantity}} PKR</td>
                            <td>

                                <div class="form-group">
                                    {!! Form::submit('Save',['class'=>'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>

                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['CartController@destroy',$orderitem->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>

                        </tr>

                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">

            <div class="row ml-4 justify-content-center">
                <div class="col-md-5 mr-2">
                    <div class="row ">
                        <div class="col-md-12 text-center border-bottom mb-5">
                            <h3 class="text-danger h3 text-uppercase">Cart Totals</h3>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <span class="text-white">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-white">{{\Cart::session(auth()->id())->getSubTotal()}} PKR</strong>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <span class="text-white">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-white">{{\Cart::session(auth()->id())->getTotal()}} PKR</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(['method'=>'GET','action'=>'CartController@checkout']) !!}



                            <div class="form-group">
                                {!! Form::submit('Proceed to Checkout',['class'=>'btn btn-success btn-lg btn-block']) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>


        </div>
    @else
        <div>
            <h1 class="text-warning mt-5">
                <center><b>
                        No Medicines in the cart
                    </b></center>
            </h1>
        </div>

    @endif


{{--        <script>--}}
{{--            let btnAdd = document.querySelector('#add');--}}
{{--            let btnSubtract = document.querySelector('#subtract');--}}
{{--            let input = document.querySelector('input');--}}

{{--            btnAdd.addEventListener('click', () => {--}}

{{--                input.value = parseInt(input.value) + 1;--}}

{{--            });--}}
{{--            btnSubtract.addEventListener('click', () => {--}}

{{--                if (input.value > 1) {--}}
{{--                    input.value = parseInt(input.value) - 1;--}}
{{--                } else {--}}
{{--                    input.value = 1;--}}
{{--                }--}}


{{--            });--}}
{{--        </script>--}}
@stop