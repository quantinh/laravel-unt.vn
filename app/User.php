<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
    //Phương thức định nghĩa mối liên hệ 1:n từ model Post (user_id tạo ra bao nhiêu bài viết)
    function posts()
    {
        return $this->hasMany('App\Post');
    }
    //Phương thức định nghĩa mối liên hệ nhiều: nhiều từ model Role (user_id này đã có bao nhiêu quyền)
    function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
