<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    { 
        try
        {
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
        $cart_id = $request->input('id');
        
        try
        { 
            $orders = Order::storeOrder($cart_id);
            
        }
        catch (\Exception $exception) 
            {
                return view('error_show');
            }
        return view('order')->with('orders',$orders);
    
    }


    public function orderHistory(Request $request,$id)
    { 
        Validator::make($request->all(),[

            'id' => 'required',
            ]);
        
        try
        {
            $orders = Order::where('user_id','=',$id)->get();
        
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('history')->with('orders',$orders);

    }


    public function delete(Request $request,$id)
    {  
        Validator::make($request->all(),[

            'id' => 'required',
            ]);
        try
        {
           $orders = Order::deleteOrder($id);
       
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return redirect('/order')->with('status','Item deleted!');
    }
}
