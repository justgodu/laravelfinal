<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'content'
    ];

    public function product(){
        $this->hasOne('App\Product');
    }
    public function user(){
        $this->hasOne('App\User');
    }
}
