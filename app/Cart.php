<?php

namespace App;
use App\Product;
use Illuminate\Support\Facades\Auth;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable=[
        'user_id',
        'prod_id',
        'quantity',

    ];

    
    public static function showCart($prod_id, $cart_quantity,$user_id)
    {
     
        $carts = new Cart();
        $carts->user_id = $user_id;
        $carts->prod_id = $prod_id;
        $carts->quantity = $cart_quantity;
        $carts->save();
       
        $joins = self::select('carts.id','carts.prod_id','carts.quantity','products.name','products.price','products.image')
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->where('carts.user_id','=',$user_id)
                ->get();

        return $joins;
      
    }
    
    public static function deleteCartItem($id)
    {
        return Cart::findOrFail($id)->delete();
    }
          
    public static function cartDisplay($user_id)      
    {   
        $carts = self::select('carts.id','carts.prod_id','carts.quantity','products.name','products.price','products.image')
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->where('carts.user_id','=',$user_id)
                ->get();
        return $carts;
    }
}
