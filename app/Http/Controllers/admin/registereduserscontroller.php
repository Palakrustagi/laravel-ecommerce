<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;

class registereduserscontroller extends Controller
{
    public function index()
    { 
        $perpage=4;
      try
        {  
            $users = User::paginate( $perpage);
            
        }
      catch (\Exception $exception) 
        {
            return view('error_show');
        }
        return view('admin.registeredusers')->with('users',$users);

    }


    public function delete(Request $request,$id)
    {
      Validator::make($request->all(),[

        'id' => 'required',
        ]);
       User::deleteUser($id);
       return redirect('registeredusers')->with('status','Account deleted!');
    }
    
}
