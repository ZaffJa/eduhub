<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Role extends Model
{
    use AuditingTrait, SoftDeletes;

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
