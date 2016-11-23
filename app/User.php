<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;
use App\Models\ShortCourse\Provider;

class User extends Authenticatable
{
    use AuditingTrait, Notifiable, SoftDeletes;

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
     * [client description]
     * @return [type] [description]
     */
    public function client()
    {
        return $this->belongsTo('App\Models\InstitutionUser','id','user_id');
    }

    /**
     * Return if user is a short provider
     * @return Provider
     *
     */
    public function short_provider()
    {
        return $this->belongsTo('App\Models\ShortCourse\Provider','id','parent_id');
    }

    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }

    public function hasRole($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->user_role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }

    public function student_profile_picture()
    {
        return $this->hasOne('App\Models\Student\StudentFile');
    }

    public function student()
    {
        return $this->hasOne('App\Models\Student\Student');
    }
}
