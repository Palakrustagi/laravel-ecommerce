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
        'prod_id',
        'quantity',

    ];

    
    public static function showCart($prod_id, $cart_quantity)
    {
        // $productByid = Product::where('id',$prod_id)->first();
        $carts = new Cart();
        $carts->prod_id = $prod_id;
        $carts->quantity = $cart_quantity;
        $carts->save();
        $joins = DB::table('carts')->join('products', 'carts.prod_id', '=', 'products.id')
                                   ->select('carts.id','carts.prod_id','carts.quantity','products.name','products.price','products.image')
                                   ->get();
        // $carts->name = $productByid->name;
        // $carts->price = $productByid->price;
        return $joins;
        
        
       
    }
    public static function cartDisplay()
    {
        $carts = DB::table('carts')->join('products', 'carts.prod_id', '=', 'products.id')
        ->select('carts.id','carts.prod_id','carts.quantity','products.name','products.price','products.image')
        ->get();
        return $carts;
    }
}
