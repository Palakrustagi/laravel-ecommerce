<?php

namespace App;
use App\Product;
use Illuminate\Support\Facades\Auth;



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
    public static function showCart($prod_id, $cart_quantity)
    {
        $productByid = Product::where('id',$prod_id)->first();
    
        $carts = new Cart();
    
        $carts->prod_id = $prod_id;
    
        $carts->name = $productByid->name;
    
        $carts->price = $productByid->price;
    
        $carts->quantity = $cart_quantity;
         
        $carts->save();
        return Cart::all();
       
    }
}
