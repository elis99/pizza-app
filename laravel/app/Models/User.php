<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\Auth\CustomVerifyEmail;
use Illuminate\Auth\MustVerifyEmail;


class User extends Authenticatable
{
    use Notifiable, MustVerifyEmail;

    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new CustomVerifyEmail);
    // }


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
