@extends('layouts.admin')
@section('content')


    {{--    <div class="content">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-8">--}}
    {{--                   @if(Session::has('order_placed'))--}}
    {{--<div class="alert alert-info" role="alert">--}}
    {{--    {{session('order_placed')}}--}}

    {{--</div>--}}
    {{--                       @endif--}}


    <div class="content">
        <div class="container-fluid">
            <div>
                <h1 class="text-danger">
                    <center><b class="text-uppercase">{{Auth::user()->role->name}} panel</b></center>
                </h1>
            </div>
            <div class="card-body">
                <h4 class="text-white mt-5">
                    Welcome, {{Auth::user()->name}} !!
                </h4></div>

            <div class="row">
                @if(Auth::user()->role->name=='admin' || Auth::user()->role->name=='staff' )


                    <div class="col-xl-5 col-lg-13">
                        <a href="{{url('/medicine')}}">

                            <div class="card card-chart">
                                <div class=" h3 card-header card-header-success">
                                    Medicine Record
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        You can view all the records of medicines as well as add new records for it.
                                    </h4>

                                </div>
                                <div class="card-footer text-white">
                                    <div>
                                        <h4> Click Here!</h4>
                                    </div>
                                </div>


                            </div>
                        </a>


                    </div>
                    <div class="col-xl-5 col-lg-13">
                        <a href="{{url('/available_inventory')}}">

                            <div class="card card-chart">
                                <div class=" h3 card-header card-header-warning">
                                    Available Stock
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        You can view the available medicines in the inventory.
                                    </h4>

                                </div>
                                <div class="card-footer text-white">
                                    <div>
                                        <h4> Click Here!</h4>
                                    </div>
                                </div>


                            </div>
                        </a>


                    </div>
                    <div class="col-xl-5 col-lg-13">
                        <a href="{{url('/sold_inventory')}}">

                            <div class="card card-chart">
                                <div class="h3 card-header card-header-info">
                                    Sold Stock
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">You can view those medicines which are sold till yet.
                                    </h4>

                                </div>
                                <div class="card-footer text-white">
                                    <div>
                                        <h4> Click Here!</h4>
                                    </div>
                                </div>


                            </div>
                        </a>


                    </div>
                    <div class="col-xl-5 col-lg-13">
                        <a href="{{url('/order')}}">

                            <div class="h3 card card-chart">
                                <div class="card-header card-header-danger">
                                    Orders
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Here are the orders placed for buying medicines.
                                    </h4>

                                </div>
                                <div class="card-footer text-white">
                                    <div>
                                        <h4> Click Here!</h4>
                                    </div>
                                </div>


                            </div>
                        </a>


                    </div>
                @endif
                @if(Auth::user()->role->name=='admin'  )
                    <div class="col-xl-5 col-lg-14">
                        <a href="{{url('/staff')}}">

                            <div class="h3 card card-chart">
                                <div class="card-header card-header-primary">
                                    Staff Details
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">You can view new staff requests here and approve them.</h4>
                                </div>
                                <br>
                                <div class="card-footer text-white ">
                                    <div>
                                        <h4>Click Here!</h4>
                                    </div>
                                </div>
                            </div>
                        </a>


                    </div>

                @endif
                    @if(Auth::user()->role->name=='customer'  )
                        <div class="col-xl-5 col-lg-14">
                            <a href="{{url('/medicine')}}">

                                <div class="h3 card card-chart">
                                    <div class="card-header card-header-primary">
                                       Medicine
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">You can view medicines here and add them to cart to place order.</h4>
                                    </div>
                                    <br>
                                    <div class="card-footer text-white ">
                                        <div>
                                            <h4>Click Here!</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>
                        <div class="col-xl-5 col-lg-14">
                            <a href="{{url('/cart/index')}}">

                                <div class="h3 card card-chart">
                                    <div class="card-header card-header-warning">
                                        Cart
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">You can view medicines that you have put in cart and proceed further to place order.</h4>
                                    </div>
                                    <br>
                                    <div class="card-footer text-white ">
                                        <div>
                                            <h4>Click Here!</h4>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>
                        @endif



            </div>
        </div>
    </div>

@stop
