<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgba(15, 10, 10, 0.733);
 
}
li {
  display: inline;
  float: right;
  
  
}


li a {
  display: block;
  padding: 8px;
  color: black;
  text-decoration: none;
  background-color: lightblue;
 }
 
li a:hover {
  background-color: #111;
}
body{
  background-color: whitesmoke;
}
.sort-font{
  color: blue;
  font-size: 15px;
  margin: 0 10px;
}

</style>
</head>              
<body>
           
<ul>
           <li style="float: left;"><a href= "{{ url('home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
           <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-off">Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
           <li> <a href="/user-edit">UserEdit <span class="glyphicon glyphicon-edit"></span></a></li>
           <li> <a href="{{ url('cart') }}">Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
           <li> <a href="{{ url('order-history') }}">Orders <span class="glyphicon glyphicon-th-large"></span></a></li>
           
           <li> <a href="{{ url('api/products') }}">List <span class="glyphicon glyphicon-th-list"></span></a></li>
           </ul>
           <div class="panel-body text-center">
           <center><b><u><h1 style="color: blueviolet;">Welcome to Website</h1></u></b></center><br>
                        <div class="alert alert-success">
                            {{ session('status') }}
                       </div>
           </div>
           <div class="row">
           <div class="col-md-4 ">
             <form action= "/search-products"   method="get">
                <div class="input-group">
                 <input type="search" name="search" >
                 <span class="input-group-prepend">
                   <button type="submit" class="btn btn-primary">Search</button>
                 </span>
                </div>

             </form>
           </div>
           </div>
           <div class="col-md-12 mb-3">
              <span class="font-weight-bold sort-form"><b>Sort by:</b></span>
              <a href="{{ URL::current() }}" class="sort-font">All</a>
              <a href="/sort-products?sort=price_asc" class="sort-font">Price: Low to high</a>
              <a href="/sort-products?sort=price_desc"  class="sort-font">Price: High to low</a>
           </div>
           
           <div class="container">
             <div class="row">
               <div class="col-md-12">
                 <div class="row">
              @foreach($products as $item)
              <div class="col-md-4">
                <div class="card">
                  <img src ="{{  asset('public/product/'.$item-> image) }}" class="w-100" width="150px" height="270px" alt= "product image" > 
                  <div class="card-body bg-light">
                  <center><h5 class="mg-0"><b>{{ $item-> name}}</b></h5>
                  <form action="/product-info/{{$item->id}}" method="post">
                  {{csrf_field() }}
        
                          <button type="submit">More details</button>
                  </form>
                  <h5 class="mg-0"> <b>INR {{ $item-> price}}</b></h5>


                   <form action="/add-cart" method="post">
                   {{csrf_field() }}
                    <input type="hidden"  name='id' value=" {{$item->id }}">
                    <b>Quantity:</b>
                    <input type="number" class="qty-input " name='quantity' value="1" min="1" max="100" />
                    <br><br>
                    <button type="submit" class="btn btn-primary" >Add to cart</a>
                   </form>
                    
                 
                    </center>
                    
                  </div>
                  </div>
                 </div>
              @endforeach
                 
                 </div>
               </div>
               </div>
             </div>
           </div>
</body>
</html>