<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    public function client()
    {
        return $this->belongsTo('App\Models\InstitutionUser','id','user_id');
    }

    public function short_provider()
    {
        return $this->belongsTo('App\Models\ShortCourse\Provider','id','user_id');
    }
}
