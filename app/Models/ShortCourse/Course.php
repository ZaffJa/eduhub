<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'short_courses';
    protected $fillable = ['provider_id', 'level_id','period_type_id', 'mode_id', 'field_id', 'name_en', 'name_ms', 'period_value_min', 'period_value_max', 'credit_hours', 'approved', 'accredited', 'commencement', 'qualification', 'mqa_reference_no'];

    public function provider()
    {
        return $this->belongsTo('App\Models\ShortCourse\Provider');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\ShortCourse\Level');
    }

    public function periodType()
    {
        return $this->belongsTo('App\Models\PeriodType');
    }

    public function mode()
    {
        return $this->belongsTo('App\Models\StudyMode');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\ShortCourse\Field');
    }

    public function files()
    {
        return $this->hasMany('App\Models\ShortCourse\File');
    }
}