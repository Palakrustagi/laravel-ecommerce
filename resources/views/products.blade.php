<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All-Products</title>
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
.add{
  text-align: center;
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
            
           <li style="float: left;"><a href= "{{ url('userwebsite') }}">Website</a></li>
           
           <li  style="float: right;"> <a href="/user-edit">UserEdit <span class="glyphicon glyphicon-edit"></span></a></li>
           <li  style="float: right;"> <a href="{{ url('cart') }}">Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
           <li  style="float: right;"> <a href="{{ url('order-history') }}">Orders <span class="glyphicon glyphicon-th-large"></span></a></li>
         
           </ul>
           <center><b><u><h1 style="color: blueviolet;">List of Products</h1></u></b></center>
           <div class="col-md-12 mb-3">
              <span class="font-weight-bold sort-form"><b>Sort by:</b></span>
              <a href="{{ URL::current() }}" class="sort-font">All</a>
              <a href="sort-product?sort=price_asc" class="sort-font">Price: Low to high</a>
              <a href="sort-product?sort=price_desc"  class="sort-font">Price: High to low</a>
           </div><br>

<div class="container">
<div class="row">                                                                                        

 

   <table class="table table-bordered">
   <thead>
       <thead>
       <tr>               
           <th>Product_Id</th>
           <th>Name</th>
           <th>Price</th>
           <th>Image</th>
           
       </tr>                   
       </thead>
<tbody>

@foreach($products as $items)

<tr>
    <td>{{ $items-> id}}</td>
    <td>{{ $items-> name}}</td>
    <td>{{ $items-> price}}</td>
    <td><img src ="{{  asset('public/product/'.$items-> image) }}" height="80px" width="80px" alt= "product image" ></td>
    
    

</tr>
@endforeach



</tbody>

</table>
{{ $products->appends($_GET)->links() }}        
</div>


</div>



</body>
</html>
