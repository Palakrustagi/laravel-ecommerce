<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     *  @var array
     */
    protected $hidden = 
    [
        'password', 'remember_token',
    ];
    public static function showUsers($limit)
    {   
        return User::paginate($limit);
    }
        
    public  static function edituser($id, $name, $pass, $oldname, $oldpass)
    {
        
        $users = User::where('name','=',$oldname)->first();
        $users->name = $name;
        $users->password = $pass;
        return $users->save();
    }
        
    public static function deleteUser($id)
    {
        $users = User::findOrFail($id); 
        $delete = $users->delete();
        return $delete;
    }

    public function isOnline()
    {
        return Cache::has('user-is-online'.$this->id);
    }
    }
