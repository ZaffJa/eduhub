<?php

namespace App\Models\Student;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class SpmRequirementCourse extends Model
{
    use AuditingTrait, SoftDeletes;
    
    protected $guarded = [];

    protected $casts = [
        'requirement' => 'array'
    ];


    public function course($id)
    {
        return SpmSubject::find($id);
    }
}
