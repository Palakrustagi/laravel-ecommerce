<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable=[
        'cart_id',
        'prod_id',
        'name',
        'price',
        'quantity',

    ];
}
