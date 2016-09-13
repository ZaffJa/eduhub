<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['faculty_id', 'nec_code', 'level_id','period_type_id', 'mode_id', 'field_id', 'name_en', 'name_ms', 'period_value_min', 'period_value_max', 'credit_hours', 'approved', 'accredited', 'commencement', 'qualification', 'mqa_reference_no'];

    public function faculty()
    {
        return $this->belongsTo('App\Models\Faculty');
    }

    public function nec()
    {
        return $this->belongsTo('App\Models\Nec', 'nec_code', 'code');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\StudyLevel');
    }

    public function periodType()
    {
        return $this->belongsTo('App\Models\PeriodType');
    }

    public function mode()
    {
        return $this->belongsTo('App\Models\StudyMode','mode_id','id');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\StudyField');
    }

    public function fees()
    {
        return $this->hasMany('App\Models\CourseFee');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
