<?php
//use Illuminate\Support\Facades\DB;
//use DB;
namespace App\Http\Controllers\admin;
use App\Product;
use App\Http\Requests\validateRequest;
use Illuminate\Http\Request;
//use Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class productscontroller extends Controller
{   
    public function index()
    {   

        return view('admin.addproducts');
    }
    public function store(validateRequest $request)
    {   try{
        $products = new Product;
        $request->validated();
        $Name = $request->input('name');
        $Price  = $request->input('price');
        if ($request->hasFile('image')) 
        {
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
           $filename = time().'.'.$extension;
           $file->move('public/product/', $filename);
        }
        
      $products = Product::addProduct($Name , $Price,$filename);
      return redirect('allproducts')->with('status','Product added!');
    }
    catch (\Exception $exception) 
        {
            return view('error_show');
        }
                     
    
     }

   public function show()
    {
        try{
             $products = Product::paginate(6);
     
             return view('admin.allproducts')->with('products',$products);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }

    }
    public function searchproducts(Request $request)
    {  try{
       $query = $request->get('search');
       $products = Product::searchProducts($query);
       return view('search')->with('products',$products);
    }
    catch (\Exception $exception) 
        {
            return view('error_show');
        }
    }
    public function website()
    {   try{
        $products = Product::paginate(5);
        return view('userwebsite')->with('products',$products);
       }
       catch (\Exception $exception) 
        {
            return view('error_show');
        }


    }
    public function display(Request $request)
    {   try{
        $sort = $request->sort;
        $products = Product::sortProducts($sort);
    
        return view('userwebsite')->with('products',$products);
    }
    catch (\Exception $exception) 
        {
            return view('error_show');
        }

}

    public function info($id)
    {  try{
       
       $data = Product::find($id);
        return view('productinfo',['product'=>$data]); 
    }
    catch (\Exception $exception) 
        {
            return view('error_show');
        } 
    }
      
    
    
    public function delete($id)
    {  
        try{
        $products = Product::deleteProduct($id);
       
       return redirect()->back()->with('status','Product deleted!');
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
    }
}
