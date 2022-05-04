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
            $limit = 5;
            $orders = Order::showOrders($limit);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('history')->with('orders',$orders);

    }

    public function store(Request $request)
    {
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
            
        ]);
        $cart_id = $request->input('id');
        try
        { 
            $orders = Order::storeOrder($cart_id);
            
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($orders)
        {
            return view('order')->with('orders',$orders);
        }
        else
        {
            return view('error_show');
        }
        
    }

     /**
     * function : orderhistory : to show order history
     * URL: order-history
     * @param Request $request , $id
     * @return mixed
     */
    public function orderHistory(Request $request,$id) 
    { 
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
        ]);
        
        try
        {
            $orders = Order::showHistory($id);
        
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($orders)
        {
            return view('history')->with('orders',$orders);
        }
        else
        {
            return view('error_show');
        }
       

    }

   
    // public function delete(Request $request,$id)
    // {  
    //     Validator::make($request->all(),
    //     [
    //         'id' => 'required|integer',
    //     ]);
    //     try
    //     {
    //        $orders = Order::deleteOrder($id);
       
    //     }
    //     catch (\Exception $exception) 
    //     {
    //         return view('error_show');
    //     }
    //     if($orders)
    //     {  
    //         return redirect('/order')->with('status','Item deleted!');
    //     }
    //     else
    //     {
    //         return view('error_show');
    //     }
    // }
}
