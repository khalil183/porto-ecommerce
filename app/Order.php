<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id','shipping_id','qty','date','amount','status',
    ];


    public function products(){
        return $this->hasMany(OrderProduct::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
