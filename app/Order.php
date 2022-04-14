<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable=[
        'user_id',
        'cart_id',
        'prod_id',
        'name',
        'price',
        'quantity',

    ];
    
    public static function deleteOrder($id)

    {
        $order = Order::findOrFail($id); 
        $order->delete();
    }
}
