<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type_id', 'parent_id', 'name', 'slug', 'abbreviation',
        'description', 'established', 'location', 'name', 'website'
    ];

    public function faculties()
    {
        return $this->hasMany('App\Models\Faculty');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\InstitutionCourse');
    }

    public function facilities()
    {
        return $this->hasMany('App\Models\Facility');
    }

    public function institution()
    {
        return $this->hasManyThrough('App\Models\Course', 'App\Models\Faculty', 'institution_id', 'faculty_id');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public function logo()
    {
        return $this->hasMany('App\Models\File')->where('files.type_id', '=', 1)->where('files.category_id', '=', 1);
    }

    public function type()
    {
        return $this->belongsTo('App\Models\InstitutionType');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\InstitutionUser');
    }

    public function scholarship()
    {
        return $this->hasMany('App\Models\institutionScholarship','fileable_id');
    }
}
