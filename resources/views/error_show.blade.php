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
  background-color: coral;
  opacity:90% ;
}
.sort-font{
  color: blue;
  font-size: 15px;
  margin: 0 10px;
}
.box{
   
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
           <li> <a href="{{url ('cart/'.Auth::id())}}">Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
           <li> <a href="{{ url('order-history') }}">Orders <span class="glyphicon glyphicon-th-large"></span></a></li>
           
           <li> <a href="{{ url('api/products') }}">List <span class="glyphicon glyphicon-th-list"></span></a></li>
           </ul>
           <div class="container">
               <div class="box">
                   <div class="jumbotron">
                       <p style="color: blue;"><b><u>ERROR 401</u></b></p>
                       <b>OOPS! Something went wrong.</b><br>
                       <b>Please try again.</b><br>
                       <a href="{{ url('userwebsite') }} " class="btn btn-primary">Go To Website </a>

                   </div>
               </div>
           </div>