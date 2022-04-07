<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class registereduserscontroller extends Controller
{
    public function index()
    {
     $users = User::paginate(3);
     //$users = User::all();
     return view('admin.registeredusers')->with('users',$users);

    }
    public function delete($id)
    {
       User::deleteUser($id);
       return redirect('registeredusers')->with('status','Account deleted!');
    }
    
}
