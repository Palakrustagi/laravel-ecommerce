<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    { 
        $orders = Order::all();
        return view('order')->with('orders',$orders);

    }
    public function store(Request $request)
    {
    
        $cart_id = $request->input('id');
    
        $cartByid = Cart::where('id',$cart_id)->first();
    
        $orders = new Order();
    
        $orders->cart_id = $cart_id;

        $orders->prod_id = $cartByid->prod_id;
    
        $orders->name = $cartByid->name;
    
        $orders->price = $cartByid->price;
    
        $orders->quantity =$cartByid->quantity;
    
        $orders->save();
    
        
        $orders = Order::all();
        return view('order')->with('orders',$orders);

    
    }
    public function delete($id)
    {
       $orders = Order::findOrFail($id); 
       $orders->delete();
       return redirect('/order')->with('status','Item deleted!');
    }
}
