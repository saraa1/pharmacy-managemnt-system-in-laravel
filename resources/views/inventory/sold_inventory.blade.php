@extends('layouts.admin')
@section('content')

    @if(count($inventory)>0)

        <div>
            <h1 class="text-primary mt-5 text-uppercase">
                <center><b>Inventory Details</b></center>
            </h1>
        </div>
        @if(Session::has('Inventory_updated'))
            <p class="bg-danger"> {{session('Inventory_updated')}} </p>
        @endif

        {{--        @if(Session::has('updated_user'))--}}
        {{--            <p class="bg-primary"> {{session('updated_user')}} </p>--}}
        {{--        @endif--}}

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th class="text-warning">Sr No.</th>
                    <th class="text-warning">Image</th>
                    <th class="text-warning">Medicine</th>
                    <th class="text-warning">Price</th>

                    <th class="text-warning">Sold Quantity</th>
                    <th class="text-warning">Total Price</th>



                    <th class="text-warning">Action</th>
                    </thead>
                    <tbody>


                    @foreach($inventory as $key=> $inven)
                        @if($inven->sold_quantity>0)
                            <tr>


                                <td>{{$key+1}}</td>
                                <td><img height="150"
                                         src="{{ asset( 'images/'.$inven->medicine->image->path )}}" alt="https://placehold.it/400x400"/></td>
                                <td>
                                    {{$inven->medicine->name}}
                                </td>
                                <td>{{$inven->medicine->price}}</td>

                                <td>{{$inven->sold_quantity}}</td>
                                <td>{{$inven->medicine->price*$inven->sold_quantity}}</td>



                                <td>
                                    <div class="form-group form-inline">
                                        <a href="{{route('inventory.show',$inven->id)}}"><button class="bg-transparent border-dark"><i class="fa fa-eye text-primary"></i></button></a>
                                        <a href="{{route('inventory.edit',$inven->id)}}"> <button class="bg-transparent border-dark"><i class="fa fa-edit text-success"></i></button></a>
                                        {!! Form::open(['method'=>'DELETE','action'=>['InventoryController@destroy',$inven->id]]) !!}

                                        <div class="form-group">
                                            <button class="bg-transparent border-dark">
                                                <i class="fa fa-trash text-danger"></i>
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                </td>
                            </tr>

                        @endif
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div>
            <h1 class="text-warning mt-5">
                <center><b>
                        There is no medicine in inventory
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