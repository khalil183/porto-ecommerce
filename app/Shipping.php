<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=[
        'name','phone','city','zip_code',
    ];
}
