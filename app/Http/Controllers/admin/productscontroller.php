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
     * function: store: to add and store products
     * URL: /store-product
     * @param ValidateRequest $request
     * @return mixed
     */
    public function store(ValidateRequest $request)
    { 
        $request->validate();
        $products = new Product;
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
        Validator::make($request->all(),
        [
            'search' => 'required',
        ]);
        $searchQuery = $request->get('search');
        $limit = 3;
        try
        {   
            $products = Product::searchProducts($searchQuery, $limit);
            
        }
        catch (\Exception $exception)       
        {
            return view('error_show');
        }
        if($products)
        {
           return view('search')->with('products',$products);
        }
        else
        {
            return view('userwebsite')->with('products',$products);
        }
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
        $limit = 3;
        try
        {
            $products = Product::sortProducts($sort, $limit);
        }       
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
      return view('products')->with('products',$products);
                    
    }
      
     /**
     * function: display: to sort products
     * URL: /sort-products
     * @param Request $request
     * @return mixed
     */
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

    public function info(Request $request , $id)
    {  
        Validator::make($request->all(),
        [
            'id' => 'required|integer',
        ]);
        try
            {
                $data = Product::productInfo($id);
                 
            }
        catch (\Exception $exception) 
            {
                return view('error_show');
            } 
        if($data)
        {
            return view('productinfo',['product'=>$data]);
        }
        else
        {
            return view('error_show');
        }
    }

  public function products(Request $request)
    {       
            $products = Product::all();    //query()->offset($offset*$limit)->take($limit)->get();
            $filter_data = []; 
            $count=0;      
            foreach($products as $row)
            {
                 array_push($filter_data, $row);  
                 $count++;         
            }
            //$count = count($filter_data);
            $page = $request->page;
            $limit = 3;
            $offset = ($page-1) * $limit; 
            $products =array_slice($filter_data, $offset, $limit);      
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
  