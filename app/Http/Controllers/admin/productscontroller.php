<?php
//use Illuminate\Support\Facades\DB;
 
namespace App\Http\Controllers\admin;
use App\Product;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidateRequest;
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
    
     /**
     * API:
     * API to initiate store
     * URL: /store-product
     * @param ValidateRequest $request
     * @return mixed
     */
    public function store(ValidateRequest $request)
    { 
        $products = new Product;
        $request->validate();
        $name = $request->input('name');
        $price  = $request->input('price');
        if (!($request->hasFile('image'))) 
            {
                return view('error_show');
            }
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('public/product/', $filename);
        try
        {
            $products = Product::addProduct($name , $price, $filename);
           
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($products)
        {
            return redirect('allproducts')->with('status','Product added!');
        }
        else
        {
            return view('error_show');
        }
     }
   
   public function show()
    {
        $limit=6;
        try
        {   
            $products = Product::allProducts($limit);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('admin.allproducts')->with('products',$products);

    }


    public function search(Request $request)
    {  
        $searchQuery = $request->get('search');
        if(!$searchQuery)
        {  
            $products = Product::all();
            return view('userwesbsite')->with('products',$products);
        }
        try
        {   
            $products = Product::searchProducts($searchQuery);
            
        }
        catch (\Exception $exception)       
        {
            return view('error_show');
        }
        return view('search')->with('products',$products);
    }


    public function website()
    {   
        $limit = 6;
        try
        {     
              $products = Product::showWebsite( $limit);
              
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
         $limit = 5;
         try
         {    
              $products = Product::sortProducts($sort , $limit);
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
              
            $products = $filter_data;      
            $products = new Paginator($products, $count, $limit, $page, ['path'  => $request->url(),'query' => $request->query(),]);                                          
            
            return view('products',['products'=>$products]);         
    }

     
    public function delete(Request $request,$id)
    {  
        Validator::make($request->all(),
        [

            'id' => 'required|integer',
        ]);

        try 
        {
            $products = Product::deleteProduct($id);
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($products)
        {
            return redirect()->back()->with('status','Product deleted!');
        }
        else
        {
            return view('error_show');
        }
    }
}
  