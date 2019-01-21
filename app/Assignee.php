<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Assignee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_name', 'customer_name','asignee_name'
    ];
    //task table
    public $table="assignee";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
