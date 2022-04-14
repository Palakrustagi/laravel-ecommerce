<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
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
.message{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;

  }
.name{
    font-size: 20px;
    padding: 20px;
  }
  .pass{
    font-size: 20px;
    padding: 20px;
  }
  .form-control
  {
    border: rgb(89, 89, 248) solid 3px;
  }
body{
  background-color: whitesmoke;
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
           <li style="float: left;"><a href= "{{ url('home') }}"> Home</a></li>
           <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-off">Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
           
           <li> <a href= "{{ url('allproducts') }}">All Products </a></li>
           <li> <a href= "/registeredusers"><span class="glyphicon glyphicon-user"></span>Users </a></li>
  </ul> 
  <center><h1 style="color: blueviolet;"><b><u>ADD PRODUCT:</u></b></h2></center>
  <div class="container">
    <div class="box">
      <div class="jumbotron">
      <div class="row">
       <form action="{{ url('store-product') }}" method="post" enctype="multipart/form-data">
        {{ @csrf_field() }}
       <div class="col-mg-4">
         <div class="form-group">
           <b><u>Name:</u></b>
          <input type="text" placeholder="enter title of the product" name="name" required class="form-control">
        </div>
      </div>
      <div class="col-mg-4">
         <div class="form-group">
         <b><u>Price:</u></b>
          <input type="text" placeholder="enter price of the product" name="price"required class="form-control">
        </div>
      </div>
      <div class="col-mg-4">
         <div class="form-group">
         <b><u>Image:</u></b>
          <input type="file" placeholder="insert image of the product" name="image" required class="form-control">
        </div>
      </div>
      <button type="submit" class="btn btn-primary" >Add Product</button>
       </form>
      </div>
      </div>
    </div>
  </div>
           