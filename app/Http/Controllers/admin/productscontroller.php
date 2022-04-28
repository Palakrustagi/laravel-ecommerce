<?php
//use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers\admin;
use App\Product;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\validateRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;


 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class productscontroller extends Controller
{   
    public function index()
    {
        return view('admin.addproducts');
    }


    public function store(validateRequest $request)
    { 
        $products = new Product;
        $request->validate();
        $name = $request->input('name');
        $price  = $request->input('price');
      try
        {
            if (!($request->hasFile('image'))) 
            {
                return view('error_show');
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('public/product/', $filename);
            $products = Product::addProduct($name , $price,$filename);
           
       }
    catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return redirect('allproducts')->with('status','Product added!');
     }
   
   public function show()
    {
        $perpage=6;
        try{
             $products = Product::paginate($perpage);
           }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('admin.allproducts')->with('products',$products);

    }


    public function search(Request $request)
    {  
        $query = $request->get('search');
        try
        {   if(!$query)
            {   $products=Product::all();
                return view('userwesbsite')->with('products',$products);
            }
            $products = Product::searchProducts($query);
            
        }
    catch (\Exception $exception)       
        {
            return view('error_show');
        }
        return view('search')->with('products',$products);
    }


    public function website()
    {   
        $perpage = 6;
        try
        {
              $products = Product::paginate($perpage);
        }
       catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('userwebsite')->with('products',$products);

    }
    
    public function sorting(Request $request)
    {
        $sort = $request->sort;
        try
        {
            $products = Product::sortingProducts($sort);
        }       
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
      return view('products')->with('products',$products);
                    
    }
      

    public function display(Request $request)
    {  
        $sort = $request->sort;
         try
         {
              $products = Product::sortProducts($sort);
         }
         catch (\Exception $exception) 
        {
            return view('error_show');
        }
        
        return view('userwebsite')->with('products',$products);

}

    public function info($id)
    {  
        try
            {
                $data = Product::find($id);
                return view('productinfo',['product'=>$data]); 
            }
        catch (\Exception $exception) 
            {
                return view('error_show');
            } 
    }

  public function products(Request $request)
    {       
            $page = $request->page;
            $limit = 2;          
            $offset = $page-1 ;
            $products = Product::query()->offset($offset*$limit)->take($limit)->get();
            $filter_data = []; 
            $count=0;      
            foreach($products as $row)
            {
                 array_push($filter_data, $row);  
                 $count++;         
            }
            
           // $count = count($filter_data);

                // $page = $request->page;
                // $perPage = 3;          
                // $offset = ($page-1) * $perPage;   
            $products = $filter_data;      
            $products = new Paginator($products, $count, $limit, $page, ['path'  => $request->url(),'query' => $request->query(),]);                                          
            
            return view('products',['products'=>$products]);         
    }

     
    public function delete(Request $request,$id)
    {  
        Validator::make($request->all(),[

            'id' => 'required',
            ]);

        try
        {
               $products = Product::deleteProduct($id);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return redirect()->back()->with('status','Product deleted!');
    }
}
