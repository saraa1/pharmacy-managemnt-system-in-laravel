<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders=Order::all();
        return view ('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',

            'shipping_zip' => 'required',
        ]);
        $order = new Order();
        $order->order_number=uniqid('OrderNumber-');
        $order->shipping_fullname = $request->shipping_fullname;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_phone = $request->shipping_phone;
        $order->shipping_zip = $request->shipping_zip;

        $order->grand_total=\Cart::session(auth()->id())->getTotal();
        $order->item_count=\Cart::session(auth()->id())->getContent()->count();
        $order->user_id=auth()->id();

//
        $order->save();


        //save order_items

       $items= \Cart::session(auth()->id())->getContent();
       foreach ($items as $item){

           $order->order_items()->attach($item->id,['price'=>$item->price,'quantity'=>$item->quantity]);
           $inven=Inventory::where('medicine_id',$item->id)->get();
           foreach ($inven as $inven){
               $inven['available_quantity']=$inven->available_quantity-1;
               $inven['sold_quantity']= $inven->sold_quantity+1;
               $inven->save();
           }


       }
      // clear cart
        \Cart::session(auth()->id())->clear();
        Session::flash('order_placed','your order has been placed successfully');
      return redirect('/admin');





    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order=Order::find($id);




        $orderitems=DB::table('orders')
            ->select('orders.id','orders.grand_total','medicines.name','order_items.price','order_items.quantity')
            ->join('order_items','orders.id','=','order_items.order_id')
            ->join('medicines','order_items.medicine_id','=','medicines.id')
            ->where(['order_items.order_id'=>$id])
            ->get();




//
        return view('orders.show',compact('order','orderitems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $order=Order::find($id);

        $orderitems=DB::table('orders')
            ->select('orders.id','orders.grand_total','medicines.name','order_items.price','order_items.quantity')
            ->join('order_items','orders.id','=','order_items.order_id')
            ->join('medicines','order_items.medicine_id','=','medicines.id')
            ->where(['order_items.order_id'=>$id])
            ->get();
       return view('orders.edit',compact('order','orderitems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        dd($request->all());
        $this->validate($request, [

            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',

            'shipping_zipcode' => 'required',
        ]);
        $order = Order::find($id);
        $order->order_number=$request->order_number;
        $order->shipping_fullname = $request->shipping_fullname;
        $order->shipping_state = $request->shipping_state;
        $order->shipping_city = $request->shipping_city;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_phone = $request->shipping_phone;
        $order->shipping_zipcode = $request->shipping_zipcode;

        $order->grand_total=$request->grand_total;
        $order->item_count=$request->item_count;
        $order->is_paid= $request->is_paid;

        $order->status=$request->status;
        $order->user_id=auth()->id();

//        if(!$request->has('billing_fullname')){
//
//            $order->billing_fullname = $request->shipping_fullname;
//            $order->billing_state = $request->shipping_state;
//            $order->billing_city = $request->shipping_city;
//            $order->billing_address = $request->shipping_address;
//            $order->billing_phone = $request->shipping_phone;
//            $order->billing_zipcode = $request->shipping_zipcode;
//        }
//        else{
//
//            $order->billing_fullname = $request->billing_fullname;
//            $order->billing_state = $request->billing_state;
//            $order->billing_city = $request->billing_city;
//            $order->billing_address = $request->billing_address;
//            $order->billing_phone = $request->billing_phone;
//            $order->billing_zipcode = $request->billing_zipcode;
//
//        }
        $order->update();


        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

       $order=Order::find($id);
       $order->order_items()->delete();
       $order->delete();
       return redirect()->back();

    }
}
