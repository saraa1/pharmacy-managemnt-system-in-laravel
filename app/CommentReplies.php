<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplies extends Model
{
    //
    protected $fillable=[


        'comment_id',
        'name',
        'email',
        'image_id',
        'body',


    ];

    public function comment(){

        return $this->belongsTo('App\Comment','comment_id');
    }
}
