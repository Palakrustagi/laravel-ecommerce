<?php

namespace App;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class product extends Model 
{
    protected $table = 'products';
    protected $fillable=[
        'name',
        'price',
        'image',

    ];
    public static function addProduct($Name , $Price,$filename)
    {
        $products = new Product();
        $products->name = $Name;
        $products->price = $Price;
      
        $products->image = $filename;
        
       $products->save();
    }
    public static function searchProducts($search)
    {
       return Product::where('name','like','%'.$search.'%')->get();
       

    }
}
