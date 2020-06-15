<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable=[


        'user_id',
        'name',
        'email',
        'body',


    ];



    public function photo(){

        return $this->belongsTo('App\Images');
    }

    public function replies(){

        return $this->hasMany('App\CommentReplies','comment_id');
    }
    public function user(){

        return $this->belongsTo('App\User');
    }
}
