<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start', 'end','note'
    ];
    //project table
    public $table="projects";

   
    public function customers()
    {
        return $this->belongsTo('App\Customer','customer_name');
    }
    public function users()
    {
        return $this->belongsTo('App\User','userid');
    }
    
}
