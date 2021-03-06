<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;

class cartController extends Controller
{
   
      
    public function store(Request $request,$user_id)
    {
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
            'quantity' => 'required',
        ]);
        $prod_id = $request->input('id');
        $cart_quantity =$request->input('quantity');
        
        try
        {
            $carts = Cart::showCart($prod_id, $cart_quantity, $user_id);
        }
        catch (\Exception $exception)  
        {
            return view('error_show');
        }
        if($carts)
        {
            return view('cart')->with('carts',$carts);
        }
        else
        {
            return view('error_show');
        }
        
    }

  
    public function show(Request $request)
    {  
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
        ]);
        $user_id = Auth::id();
       try
        {
            $carts = Cart::cartDisplay($user_id);
           
        }
       catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($carts)
        {
            return view('cart')->with('carts',$carts);
        }
        else
        {
            return view('error_show');
        }
    } 
   

    public function delete(Request $request ,$id)
    { 
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
        ]);
        
        try
        {
            $carts = Cart::deleteCartItem($id);
        
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($carts)
        {
            return redirect('/cart')->with('status','Item deleted!');
        }
        else
        {
            return view('error_show');
        }
        
    }
}
