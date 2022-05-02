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
        // $productByid = Product::where('id',$prod_id)->first();
        $carts = new Cart();
        $carts->user_id = $user_id;
        $carts->prod_id = $prod_id;
        $carts->quantity = $cart_quantity;
        $carts->save();
        // $arts = DB::table('carts')->join('users', 'carts.user_id', '=', 'users.id')
        //                           ->select('carts.user_id')
        //                           ->get();
        $joins = DB::table('carts')->join('products', 'carts.prod_id', '=', 'products.id')
                                   ->select('carts.id','carts.prod_id','carts.quantity','products.name','products.price','products.image')
                                   ->where('carts.user_id','=',$user_id)
                                   ->get();
        // $carts->name = $productByid->name;
        // $carts->price = $productByid->price;
        return $joins;
      
    }

          
    public static function cartDisplay($user_id)      
    {   
        $carts = DB::table('carts')->join('products', 'carts.prod_id', '=', 'products.id')
                                   ->select('carts.id','carts.prod_id','carts.quantity','products.name','products.price','products.image')
                                   ->where('carts.user_id','=',$user_id)
                                   ->get();
        return $carts;
    }
}
