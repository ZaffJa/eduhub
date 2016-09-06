<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

    protected $table = 'short_fields';
    protected $fillable = ['field', 'slug'];

    public function courses()
    {
        return $this->hasMany('App\Models\ShortCourse\Course', 'field_id');
    }
}
