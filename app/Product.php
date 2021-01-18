<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image'
    ];

    public function category(){
        return $this->belongsToMany("App\Category", 'product_category' );
    }

    public function comment(){
        return $this->hasMany("App\Comment", "product_id");
    }
}
