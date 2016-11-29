<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Faculty extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $fillable = ['institution_id', 'name'];
    protected $dates = ['deleted_at'];

    public function institution()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}