<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $table = 'short_providers';
    protected $fillable = [
        'type_id', 'parent_id', 'name', 'slug', 'abbreviation',
        'description', 'established', 'location', 'name', 'website'
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\ShortCourse\Course');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\ShortCourse\ProviderType');
    }

    public function logo()
    {
        return $this->morphMany('App\Models\ShortCourse\File', 'fileable')->where('short_files.type_id', '=', 1)->where('short_files.category_id', '=', 1);
    }

    public function files()
    {
        return $this->morphMany('App\Models\ShortCourse\File', 'fileable');
    }

}