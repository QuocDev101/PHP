<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
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

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function show() {
        $user = self::all();
        return $user;
    }


    public static function updateUser($id, $data) {
        $user = self::find($id); // Tìm người dùng theo ID
        if ($user) {
            $user->update($data); // Cập nhật dữ liệu
            return $user;
        }
        return null; // Trả về null nếu không tìm thấy người dùng
    }
    public static function deleteUser($id) {
        $user = self::find($id); // Tìm người dùng theo ID
        if ($user) {
            $user->delete(); // Xóa người dùng
            return true;
        }
        return false; // Trả về false nếu không tìm thấy người dùng
    }
    
    public static function findUserById($id) {
        return self::find($id); // Tìm người dùng theo ID
    }
    

}
