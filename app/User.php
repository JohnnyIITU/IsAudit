<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    const ROLE_CLIENT = 'user';
    const ROLE_ADMIN = 'admin';
    const ROLE_ROOT = 'root';
    //'user','admin','root'
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function checkAdminAccess(){
        return in_array(Auth::user()->role, [
            self::ROLE_ADMIN => self::ROLE_ADMIN,
            self::ROLE_ROOT => self::ROLE_ROOT,
        ]);
    }

    public static function checkRootAccess(){
        return Auth::user()->role === self::ROLE_ROOT;
    }

    public function getRoleLabel(){
        $roles = [
            self::ROLE_CLIENT => 'User',
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_ROOT => 'Root',
        ];
        return $roles[$this->role];
    }

    public function getCompanyLabel(){
        return Company::where('id', $this->company_id)->first()->fullname ?? 'DELETED';
    }

    public static function getRoles(){
        if(Auth::user()->checkRootAccess()){
            return [
                self::ROLE_CLIENT => 'User',
                self::ROLE_ADMIN => 'Admin',
                self::ROLE_ROOT => 'Root',
            ];
        }else{
            return [
                self::ROLE_CLIENT => 'User',
                self::ROLE_ADMIN => 'Admin',
            ];
        }
    }

    public static function getUserName($id){
        return self::where('id', $id)->first()->name;
    }
}
