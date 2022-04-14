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
           <li> <a href="{{ url('useredit') }}">UserEdit <span class="glyphicon glyphicon-edit"></span></a></li>
           <li> <a href="{{ url('userwebsite') }}">GoToWebsite </a></li>
           </ul>
           <div class="panel-body text-center">
                        <div class="alert alert-success">
                            {{ session('status') }}
            </div>
            <a href="/userwebsite" class="btn btn-primary">Continue shopping</a> <br><br>
<div class="container">
           <table class="table table-bordered">
   <thead>
       <thead>
       <tr>
           <th>USER_ID</th>
           <th>Product_ID</th>
           <th>Name</th>
           <th>Price</th>
           <th>Quantity</th>
           
           
       </tr>
       </thead>
<tbody>
@foreach($orders as $element)
<tr>
    <td>{{ $element-> user_id}}</td>
    <td>{{ $element-> prod_id}}</td>
    <td>{{ $element-> name}}</td>
    <td>{{ $element-> price}}</td>
    <td>{{ $element-> quantity}}</td>
  
    
    

</tr>
@endforeach

<div>

</div>

</tbody>
</table>

</div>
                
                    




</body>