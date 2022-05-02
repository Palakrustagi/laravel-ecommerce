<?php

namespace App;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    protected $table = 'products';
    protected $fillable=[
        'name',
        'price',
        'image',

    ];

    public static function addProduct($name , $price,$filename)
    {
        $products = new Product();
        $products->name = $name;
        $products->price = $price;
        $products->image = $filename;
        $products->save();
    }


    public static function searchProducts($search)
    {
       return Product::where('name','like','%'.$search.'%')->get();
    }

    public static function sortProducts($sort)
    {
        $perpage=6;
        if($sort == 'price_asc')
        {  
          return Product::orderBy('price','asc')->paginate( $perpage);
        }

        else if($sort == 'price_desc')
        { 
         return Product::orderBy('price','desc')->paginate( $perpage);                   
        }
   
        else
        {         
         return Product::paginate( $perpage);   
        }
    }

    public static function sortingProducts($sort)
    {
        $perpage=2;
        if($sort == 'price_asc')
        {  
           $products = Product::orderBy('price','asc')->paginate($perpage);
           return $products;
        }
        else if($sort == 'price_desc')
        {  
           $products= Product::orderBy('price','desc')->paginate($perpage);
           return $products;
        }
        else
        {
           $products= Product::paginate($perpage);
           return $products;
        }
    }


    public static function deleteProduct($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete();
    }
}
