<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class InstitutionCourse extends Model
{
    use SoftDeletes;
    use AuditingTrait;

    protected $fillable = [
        'institution_id', 'course_id'];

    public function institution()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
