<?php

namespace App\Http\Controllers;

use App\Images;
use App\Inventory;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inventory=Inventory::all();

        return view('inventory.index',compact('inventory'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $inventory=Inventory::find($id);
        return view ('inventory.show',compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $inventory=Inventory::find($id);
        return view('inventory.edit',compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input=$request->all();


        Inventory::find($id)->update($input);
        Session::flash('Inventory_updated','the inventory has been added');
        return redirect('/inventory');
    }

    public function available_inventory(){

        $inventory=Inventory::all();
        return view('inventory.available_inventory',compact('inventory'));
    }
    public function sold_inventory(){

        $inventory=Inventory::all();
        return view('inventory.sold_inventory',compact('inventory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Inventory::find($id)->delete();
        return redirect('/inventory');
    }
}
