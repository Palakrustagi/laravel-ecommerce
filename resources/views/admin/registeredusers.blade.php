<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered-users</title>
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
           
           <li> <a href="/addproducts"><span class="glyphicon glyphicon-plus"></span>Add Products</a></li>
           <li> <a href="/allproducts"><span class="glyphicon glyphicon-th-large"></span> Products </a></li>
           </ul>
           <div class="panel-body text-center">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
</div>
<div class="container-fluid">
   <table class="table table-bordered">
   <thead>
       <thead>
       <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Email</th>
           <th>online/offline</th>
           <th>Action</th>
       </tr>
       </thead>
<tbody>
@foreach($users as $item)
<tr>
    <td>{{ $item-> id}}</td>
    <td>{{ $item-> name}}</td>
    <td>{{ $item-> email}}</td>
    <td>
        @if($item->isOnline())
        online
        @else
        offline
        @endif
    </td>
    <td>
      <form action="/action-user/{{$item->id}}" method="post">
        {{csrf_field() }}
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-primary" class="btn btn-primary">Delete</button>
      </form>
    </td> <br>

</tr>
@endforeach

</tbody>
</table>
<div class="float-right">
{{$users->links()}}

</div>
</div>

</body>
</html>
