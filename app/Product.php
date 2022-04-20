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
    public static function sortProducts($sort)
    {
        if($sort == 'price_asc')
        { 
            
          return Product::orderBy('price','asc')->paginate(6);
        }
        else if($sort == 'price_desc')
   
      {
         
       return Product::orderBy('price','desc')->paginate(6);
   
      }
   
      else{
       
       return Product::paginate(5);
   
      }
    }
    public static function deleteProduct($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete();
    }
}
