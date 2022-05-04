<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searched-Products</title>
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
.box{
    border: black solid 2px;
  text-align: center;
}
.container{
  min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
</head>
<body>
           <ul>
           <li style="float: left;"><a href= "{{ url('dashboard') }}"> Dashboard</a></li>
           <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-off">Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
           <li> <a href=#>Edit <span class="glyphicon glyphicon-edit"></span></a></li>
           <li><a href="{{ url('addproducts') }}">Add Products</a></li>
           <li><a href="{{ url('userwebsite') }}">GoToWebsite</a></li>
                    
           </ul>


</div>
<br>
<a href="/userwebsite" class="btn btn-primary">Go back</a><br>
<div class="container-fluid">
   <table class="table table-bordered">
   <thead>
       <thead>
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Price</th>
           <th>Image</th>
           <th>Action</th>
       </tr>
       </thead>
<tbody>
@foreach($products as $items)
<tr>
    <td>{{ $items-> id}}</td>
    <td>{{ $items-> name}}</td>
    <td>{{ $items-> price}}</td>
    <td><img src ="{{  asset('public/product/'.$items-> image) }}" height="80px" width="80px" alt= "product image" ></td>
    
    <td>
    <form action="/add-cart" method="post">
                   {{csrf_field() }}
                    <input type="hidden"  name='id' value=" {{$items->id }}">
                    <b>Quantity:</b>
                    <input type="number" class="qty-input " name='quantity' value="1" min="1" max="100" />
                    <br><br>
                    <button type="submit" class="btn btn-primary" >Add to cart</a>
                   </form>
    </td> <br>

</tr>
@endforeach
{{ $products -> links()}}

</tbody>
</table>
</div>



</body>
</html>
