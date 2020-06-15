<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected  $fillable=['medicine_id','available_quantity'];

    public function medicine(){

        return $this->belongsTo('App\Medicine');
    }
}
