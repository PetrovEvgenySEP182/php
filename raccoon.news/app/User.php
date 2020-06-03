<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 *
 * @property-read $id
 * @property $name
 * @property $email
 * @property $password
 * @property $remember_token
 * @property-read $created_at
 * @property-read $updated_at
 * @property News[]|\Illuminate\Database\Eloquent\Collection $news
 * @property boolean $admin
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    function news(){
        return $this->hasMany(News::class);
    }
}
