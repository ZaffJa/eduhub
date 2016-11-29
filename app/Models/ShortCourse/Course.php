<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Course extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $table = 'short_courses';
    protected $guarded  = ['others','short_pic1','short_pic2','short_pic3','short_pic4','short_pic5'];

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
