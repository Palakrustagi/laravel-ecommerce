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

        try{
        $orders = Order::all();
        return view('history')->with('orders',$orders);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }

    }
    public function store(Request $request)
    {
    try{
        $cart_id = $request->input('id');
    
        $orders = Order::storeOrder($cart_id);
        return view('order')->with('orders',$orders);
    }
    catch (\Exception $exception) 
        {
            return view('error_show');
        }
    
    }
    public function orderHistory($id)
    {  
        
        try{
      $orders = Order::where('user_id','=',$id)->get();
        return view('history')->with('orders',$orders);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }

    }
    public function delete($id)
    {  
        try{
        $orders = Order::deleteOrder($id);
       return redirect('/order')->with('status','Item deleted!');
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
    }
}
