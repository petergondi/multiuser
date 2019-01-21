<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Notifications extends Authenticatable
{
    use Notifiable;
    protected $guard='admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table="admin";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 

}
