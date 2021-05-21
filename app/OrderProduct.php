<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable=[
        'order_id','user_id','product_id','name','price','qty','image',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
