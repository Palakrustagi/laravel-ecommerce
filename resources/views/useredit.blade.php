<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Useredit</title>
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
           <li style="float: left;"><a href= "{{ url('home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
           <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-off">Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
           <li> <a href= "{{ url('userwebsite') }}">Website </a></li>
  </ul>
           

  <div class="container">
    <div class="box">
    
           <h1><u>Edit your profile </u></h1>
           
           <form action="{{url ('edit-profile/'.Auth::id())}}" method="post">
           {{ csrf_field() }}
           <div class="name"><b><u>Name:</u></b></div> 
               <div class="row">
               
                   <div class="col-sm-6">
                <input type="text"  class="form-control" placeholder="enter old name*" name="oldname"  required/>  
                </div>
                  
                    <div class="col-sm-6">

                   <input type="text" class="form-control"  placeholder="enter new name*"  minlength="6" maxlength="15" name="newname" required />  
                    </div>
                  
               </div>
           
             
               <div class="pass"><b><u>Password:</u></b></div> 
                <div class="row">
                   <div class="col-sm-6">
 
                   <input type="password" class="form-control" placeholder="enter old passsword*" name="oldpass" required />  
                      
                   </div>
                    <div class="col-sm-6">
            
                   <input type="password" class="form-control" placeholder="enter new password*" minlength="7" maxlength="12" name="newpass" required/>  
                   <br>
                   </div>
                   <center>
                   <div class="row">
                   <div class="subbtn">
                   <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                   </div>
                   </center>
                 
              
                
                 
                
                
                 
</form>
           </div>
           </div>
           </div>
           </div> 
           
           
</body>