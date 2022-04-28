<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;

class cartController extends Controller
{
   
      
    public function store(Request $request)
            {
                $prod_id = $request->input('id');
                $cart_quantity =$request->input('quantity');

               try
               {
                    $carts = Cart::showCart($prod_id, $cart_quantity);
               }
               catch (\Exception $exception) 
               {
                   return view('error_show');
               }
        
        return view('cart')->with('carts',$carts);
    }

  
    public function show()
    {  
       try
        {
            $carts = Cart::cartDisplay();
           
        }
       catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('cart')->with('carts',$carts);

    } 


    public function delete(Request $request ,$id)
    { 
        Validator::make($request->all(),[

            'id' => 'required',
            ]);
      try
      {
            $carts = Cart::findOrFail($id)->delete();
           
      }
    catch (\Exception $exception) 
    {
        return view('error_show');
    }
    return redirect('/cart')->with('status','Item deleted!');
    }
}
