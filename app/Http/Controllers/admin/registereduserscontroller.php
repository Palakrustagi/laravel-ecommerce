<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class registereduserscontroller extends Controller
{
    public function index()
    { 
      try{   
         $users = User::paginate(3);
     
         return view('admin.registeredusers')->with('users',$users);
      }
      catch (\Exception $exception) 
        {
            return view('error_show');
        }

    }
    public function delete($id)
    {
       User::deleteUser($id);
       return redirect('registeredusers')->with('status','Account deleted!');
    }
    
}
