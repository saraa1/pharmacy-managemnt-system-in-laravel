<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function order_items(){

        return $this->belongsToMany('App\Medicine',
            'order_items','order_id',
            'medicine_id')->withPivot(['quantity','price']);
    }
}
