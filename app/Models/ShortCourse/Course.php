<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'short_courses';
    protected $fillable = [
        'name_en', 'name_ms','description', 'period_type_id', 'level_id',
        'field_id', 'code', 'start_date', 'length','attendance', 'class_size', 'price',
        'exam_fee', 'note', 'language','hrdf_scheme','location','learning_outcome','inclusive',
        'provider_id','mode_id'];

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
