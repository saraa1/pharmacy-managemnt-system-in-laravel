@extends('layouts.admin')
@section('content')
<h1 class="m-5 text-center text-warning text-uppercase">View Inventory Details</h1>
<div class="row">
    <div class="col-md-7 ml-2">
        <div class="card">
            <div class="card-header card-header-danger text-center">
                <h2 class="">Medicine Details</h2>
            </div>
            <div class="card-body ml-4 table-responsive">
                 <table class="table table-hover">

                     <tbody>
                       <tr>
                         <td class="h3"><b>Name: </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$inventory->medicine->name}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Type: </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp      {{$inventory->medicine->medicine_type->name}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Description: </b>&nbsp&nbsp&nbsp&nbsp {{$inventory->medicine->description}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Dose: </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$inventory->medicine->dose}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Price: </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$inventory->medicine->price}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Total_quantity: </b> &nbsp&nbsp{{$inventory->medicine->quantity}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Available: </b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$inventory->available_quantity}}</td>
                       </tr>
                       <tr>
                           <td class="h3"><b>Sold_quantity: </b>&nbsp&nbsp&nbsp {{$inventory->sold_quantity}}</td>
                       </tr>
                     </tbody>

                   </table>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="border border-dark text-center">
                <img height="400" width="300"
                     src="{{asset($inventory->medicine->image ? 'images/'.$inventory->medicine->image->path : 'https://placehold.it/600x600')}}"
                     alt="">
            </div>
        </div>
    </div>


</div>


@stop
