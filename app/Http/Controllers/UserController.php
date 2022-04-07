<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
       
        return view('useredit');
    }
    public function editUser(Request $request , $id)
    {  
        
        $name = $request->input('newname');
        $pass = $request->input('newpass');
        User::submit($id,$name,$pass);
        
    }
    
}
