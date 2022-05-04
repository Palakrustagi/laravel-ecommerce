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
      $limit = 5;
      try
        {  
          $users = USER::showUsers($limit);
        }
      catch (\Exception $exception) 
        {
          return view('error_show');
        }
        return view('admin.registeredusers')->with('users',$users);

    }
   
    
     /**
     * function: delete: to delete users
     * URL: /action-user
     * @param Request $request , user-id
     * @return mixed
     */
    public function delete(Request $request,$id)
    {
      Validator::make($request->all(),
      [
        'id' => 'required|integer',
      ]);
      $users = User::deleteUser($id);
      if($users)
      {
        return redirect('registeredusers')->with('status','Account deleted!');
      }
      else
      {
        return view('error_show');
      }
    }
    
}
