<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function user_role()
    {
        return $this->belongsTo('App\Models\UserRole','role_id','id');
    }
}
