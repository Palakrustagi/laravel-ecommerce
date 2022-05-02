<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Cart</title>
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
           <li> <a href="{{ url('userwebsite') }}">GoToWebsite  <span class="glyphicon glyphicon-chevron-right"></span></a></li>
           <li> <a href="{{ url('order-history') }}">Orders <span class="glyphicon glyphicon-th-large"></span></a></li>
           </ul>
           <div class="panel-body text-center">
                        <div class="alert alert-success">
                            {{ session('status') }}
            </div>
            <a href="/userwebsite" class="btn btn-primary">Add more items</a> <br><br>
<div class="container">
           <table class="table table-bordered">
   <thead>
       <thead>
       <tr>
           <th>ID</th>
           <th>Product_ID</th>
           <th>Name</th>
           <th>Image</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Action</th>
           <th>Order</th>
       </tr>
       </thead>
<tbody>
@foreach($carts as $element)
<tr>
    <td>{{ $element-> id}}</td>
    <td>{{ $element-> prod_id}}</td>
    <td>{{ $element-> name}}</td>
    <td><img src ="{{  asset('public/product/'.$element-> image) }}" height="80px" width="80px" alt= "product image" ></td>
    
    <td>{{ $element-> price}}</td>
    <td>{{ $element-> quantity}}</td>
  
    
    <td>
      <form action="/cart-item/{{$element->id}}" method="post">
        {{csrf_field() }}
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-primary" class="btn btn-primary">Delete</button><br>
      </form> 
    </td>
    <td>
      <form action="/place-order" method="post">
                   {{csrf_field() }}
                   <input type="hidden"  name='id' value=" {{$element->id }}">
                    
                    
                    <button type="submit" class="btn btn-primary" >Place Order</a>
        </form>
                    
    </td>

</tr>
@endforeach

<div>

</div>

</tbody>
</table>

</div>
                
                    




</body>