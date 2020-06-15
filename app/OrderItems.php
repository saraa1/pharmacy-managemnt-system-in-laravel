<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    //
    protected $fillable=['order_id','medicine_id','price','quantity'];

    public function medicine(){

        return $this->belongsToMany('App\Medicine');
    }



}
