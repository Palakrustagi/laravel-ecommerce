<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {   
        return view('useredit');
    }
    public function edit(Request $request , $id)
    { 
        $name = $request->input('newname');
        $oldname = $request->input('oldname');
        $oldpass = $request->input('oldpass');
        $pass = $request->input('newpass'); 
        Validator::make($request->all(),[

            'id' => 'required',
            'name' => 'required|unique:users,name',
            'pass' => 'required']);
        
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