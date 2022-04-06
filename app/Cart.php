<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable=[
        'prod_id',
        'name',
        'price',
        'quantity',

    ];
}
