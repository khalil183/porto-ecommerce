<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name','slug','category_id','price','image','status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
