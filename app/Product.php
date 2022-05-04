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
    public static function showWebsite($limit)
    {
        $products = Product::paginate($limit);
        return $products;
    }
    
    public static function addProduct($name , $price,$filename)
    {
        $products = new Product();
        $products->name = $name;
        $products->price = $price;
        $products->image = $filename;
        return $products->save();
    }
    
    public static function allProducts($limit)
    {
        $products = Product::paginate($limit);
        return $products;
    }
    public static function productInfo($id)
    {
        return Product::find($id);
    }
 
    public static function searchProducts($search, $limit)
    {
       if( empty($search))
       {
           return Product::paginate( $limit);
       }
       return Product::where('name','like','%'.$search.'%')->paginate( $limit);
    }

    public static function sortProducts($sort , $limit)
    {
       
        if($sort == 'price_asc')
        {  
          return Product::orderBy('price','asc')->paginate($limit);
        }

        else if($sort == 'price_desc')
        { 
         return Product::orderBy('price','desc')->paginate($limit);                   
        }
   
        else
        {         
         return Product::paginate($limit);   
        }
    }
    
    public static function deleteProduct($id)
    {
        if( empty($id))
        {
            return null;
        }
        $product = Product::findOrFail($id); 
        return $product->delete();
    }
}
