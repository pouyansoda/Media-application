<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo_id', 'is_active'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

//    public function setPasswordAttribute($password)
//    {
//        if (!empty($password)) {
//            $this->attribute['password'] = bcrypt($password);
//        }
//    }

    public function isAdmin()
    {
        if ($this->role->name == 'administrator' && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

}
