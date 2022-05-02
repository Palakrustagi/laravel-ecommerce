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


    public function orderHistory(Request $request,$id)
    { 
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
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

    /**
     * API:
     * API to initiate delete
     * URL: place-order
     * @param Request $request , $id
     * @return mixed
     */
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
