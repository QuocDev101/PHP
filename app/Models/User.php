<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Model
{
    //
    protected $table = 'users';
    protected $fillable = [
        'firstname',
        'name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'image',
        'gender',
        'birthday',
        'users_type',
        'expiry_date',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    
    


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function show() {
        $user = self::all();
        return $user;
    }


    public static function updateUser($id, $data) {
        $user = self::find($id); 
        if ($user) {
            $user->update($data); 
            return $user;
        }
        return null; 
    }
    public static function deleteUser($id) {
        $user = self::find($id);
        if ($user) {
            $user->delete(); 
            return true;
        }
        return false; 
    }
    
    public static function findUserById($id) {
        return self::find($id); 
    }
    

}
