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
        try{
             $name = $request->input('newname');
             $pass = $request->input('newpass');
             User::edituser($id,$name,$pass);         
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
                
    }   
} 