<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public static function storeOrder($cart_id)
    {
        $cartByid = Cart::where('id',$cart_id)->first();
        $orders = new Order();
        $orders ->user_id = Auth::id();
        $orders->cart_id = $cart_id;
        $orders->prod_id = $cartByid->prod_id;
        $orders->name = $cartByid->name;
        $orders->price = $cartByid->price;
        $orders->quantity =$cartByid->quantity;
        $orders->save();
    }
   

}
