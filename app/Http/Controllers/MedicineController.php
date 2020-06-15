<?php

namespace App\Http\Controllers;

use App\Images;
use App\Inventory;
use App\Medicine;
use App\MedicineType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       $med=Medicine::all();

        return  view ('medicine.index',compact('med'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $medtype= MedicineType::pluck('name','id')->all();
        return view('medicine.create',compact('medtype'));
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
//        $this->validate($request,[
//            'name'=>'required',
//            'medicine_type_id'=>'required',
//            'description'=>'required',
//            'grams'=>'required',
//            'price'=>'required',
//            'quantity'=>'required',
//            'image_id'=>'required'
//        ]);


        $input=$request->all();
        if($file=$request->file('image_id')){

            $name= $file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Images::create(['path'=>$name]);
            $input['image_id']=$photo->id;
        }


        $med=Medicine::create($input);
        Inventory::create(['medicine_id'=>$med->id,'available_quantity'=>$med->quantity]);

        Session::flash('med_added','the medicine has been added');
        return redirect('/admin');

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
        $med=Medicine::find($id);
        return view('medicine.show',compact('med'));
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
        $med=Medicine::find($id);
        $medtype= MedicineType::pluck('name','id')->all();
        return view ('medicine.edit',compact('med','medtype'));
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
        if($file=$request->file('image_id')){

            $name= $file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Images::create(['path'=>$name]);
            $input['image_id']=$photo->id;
        }

        $med=Medicine::find($id)->update($input);
        Session::flash('med_added','the medicine has been added');
        return redirect('/medicine');
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
        $med=Medicine::find($id);
        if($med->image){

            unlink(public_path().'/images/'.($med->image->path));
        }
        $med->delete();
        return redirect('/medicine');
    }

    public function search(Request $request){
        $search=$request->get('search');
        $med=DB::table('medicines')->where('name','like','%'.$search.'%')->get();
        return view ('medicine.index',compact('med'));

    }
}
