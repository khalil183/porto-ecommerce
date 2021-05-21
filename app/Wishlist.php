<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=[
        'product_id','user_id','status',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
