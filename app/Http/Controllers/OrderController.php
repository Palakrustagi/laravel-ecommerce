<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    { 
        $orders = Order::all();
        return view('history')->with('orders',$orders);

    }
    public function store(Request $request)
    {
    
        $cart_id = $request->input('id');
    
        $cartByid = Cart::where('id',$cart_id)->first();
    
        $orders = new Order();
        $orders ->user_id = Auth::id();
        $orders->cart_id = $cart_id;

        $orders->prod_id = $cartByid->prod_id;
    
        $orders->name = $cartByid->name;
    
        $orders->price = $cartByid->price;
    
        $orders->quantity =$cartByid->quantity;
    
        $orders->save();
    
        
        $orders = Order::all();
        return view('order')->with('orders',$orders);

    
    }
    public function orderHistory($id)
    {  
        
        
      $orders = Order::where('user_id','=',$id)->get();
        return view('history')->with('orders',$orders);

    }
    public function delete($id)
    {  $orders = Order::deleteOrder($id);
       
       return redirect('/order')->with('status','Item deleted!');
    }
}
