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

    public static function showOrders($limit)
    {
        return Order::paginate($limit);
    }

    // public static function deleteOrder($id)
    // {
    //     $order = Order::findOrFail($id); 
    //     return $order->delete();
    // }
    public static function showHistory($id)
    {
        if( empty($id))
        {
            return null;
        }
        return Order::where('user_id','=',$id)->get();
    }

    public static function storeOrder($cart_id)
    {
        if( empty($cart_id))
        {
            return null;
        }
        $cartByid = Cart::where('id',$cart_id)->first();
        $orders = new Order();
        $orders ->user_id = Auth::id();
        $orders->cart_id = $cart_id;
        $orders->prod_id = $cartByid->prod_id;
        $orders->name = $cartByid->name;
        $orders->price = $cartByid->price;
        $orders->quantity =$cartByid->quantity;
        return $orders->save();
    }
   

}
