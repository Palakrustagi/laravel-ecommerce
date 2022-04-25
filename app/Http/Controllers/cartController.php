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
       try
       {
        $prod_id = $request->input('id');
        $cart_quantity =$request->input('quantity');
        
        $carts = Cart::showCart($prod_id, $cart_quantity);
        return view('cart')->with('carts',$carts);
    
       }
       catch (\Exception $exception) 
        {
            return view('error_show');
        }
    }

  
    public function show()
    {  try{
        $carts = Cart::all();
        return view('cart')->with('carts',$carts);
       }
       catch (\Exception $exception) 
        {
            return view('error_show');
        }

    } 
    public function delete($id)
    { 
        try{
       $carts = Cart::findOrFail($id); 
       $carts->delete();
       return redirect('/cart')->with('status','Item deleted!');
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
    }
}
