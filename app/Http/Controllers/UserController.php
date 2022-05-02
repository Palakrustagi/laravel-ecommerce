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

     /**
     * API:
     * API to initiate edit
     * URL: user-edit/{id}
     * @param Request $request , $id
     * @return mixed
     */
    public function edit(editRequest $request , $id) 
    {   
        $name = $request->input('newname');
        $oldname = $request->input('oldname');
        $oldpass = $request->input('oldpass');
        $pass = $request->input('newpass'); 
        $request->validate();
        
        try
        {  
            $users = User::edituser($id, $name, $pass, $oldname, $oldpass);         
        }
        catch (\Exception $exception) 
        {
            return view('error_show');
        }
        if($users)
        {
          return redirect()->back()->with('status','Account updated!');
        }
        else
        {
            return view('error_show');
        }
                
    }   
} 