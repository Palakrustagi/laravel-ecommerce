<?php
//use Illuminate\Support\Facades\DB;
//use DB;
namespace App\Http\Controllers\admin;
use App\Product;
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
    public function store(Request $request)
    {
        $products = new Product;
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

   public function show()
    {
     $products = Product::paginate(6);
     //$users = User::all();
     return view('admin.allproducts')->with('products',$products);

    }
    public function searchproducts(Request $request)
    {
       $query = $request->get('search');
       $products = Product::searchProducts($query);
       return view('search')->with('products',$products);
    }
    public function website()
    {
        $products = Product::paginate(5);
        return view('userwebsite')->with('products',$products);


    }
    public function display(Request $request)
    {
        $sort = $request->sort;

     if($sort == 'price_asc')
     {
        $products = Product::orderBy('price','asc')->paginate(6);
     }
     elseif($sort == 'price_desc')

   {
    $products = Product::orderBy('price','desc')->paginate(6);

   }

   else{

    $products = Product::paginate(5);

   }
        return view('userwebsite')->with('products',$products);

}

    public function info($id)
    {
       
       $data = Product::find($id);
        return view('productinfo',['product'=>$data]);  
    }
      
    
    
    public function delete($id)
    {
       $products = Product::findOrFail($id); 
       $products->delete();
       return redirect()->back()->with('status','Product deleted!');
    }
}
