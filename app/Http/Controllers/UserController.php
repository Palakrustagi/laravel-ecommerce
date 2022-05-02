<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\editRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
        return view('useredit');
    }
    public function edit(editRequest $request , $id) 
    { 
        $name = $request->input('newname');
        $oldname = $request->input('oldname');
        $oldpass = $request->input('oldpass');
        $pass = $request->input('newpass'); 
        $request->validate();
        
        try
        {  
             User::edituser($id,$name,$pass,$oldname,$oldpass);         
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return redirect()->back()->with('status','Account updated!');
                
    }   
} 