<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class cartController extends Controller
{
   public function index()
   { 
        $carts = Cart::all();
        return view('cart')->with('carts',$carts);

      
   }
      
    public function store(Request $request)
    {
    
        $prod_id = $request->input('id');
    
        $productByid = Product::where('id',$prod_id)->first();
    
        $carts = new Cart();
    
        $carts->prod_id = $prod_id;
    
        $carts->name = $productByid->name;
    
        $carts->price = $productByid->price;
    
        $carts->quantity =$request->input('quantity');
    
        $carts->save();
    
        //return redirect('/show-cart');
        $carts = Cart::all();
        return view('cart')->with('carts',$carts);

    
    }

  
    public function show()
    {
        $carts = Cart::all();
        return view('cart')->with('carts',$carts);

    } 
    public function delete($id)
    {
       $carts = Cart::findOrFail($id); 
       $carts->delete();
       return redirect('/cart')->with('status','Item deleted!');
    }
}