<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reply extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reply', 
    ];
    //task table
    public $table="reply";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //public function user()
    //{
        //return $this->belongsTo('App\User','asignee_id');
    //}
    
}
