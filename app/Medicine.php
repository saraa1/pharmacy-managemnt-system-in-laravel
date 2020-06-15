<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    protected $fillable=[
        'name','medicine_type_id','description','dose','price','quantity','image_id'
    ];

    public function image(){

        return $this->belongsTo('App\Images','image_id');
    }

    public function medicine_type(){

        return $this->belongsTo('App\MedicineType');
    }
}
