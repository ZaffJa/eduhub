<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['institution_id', 'name'];

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