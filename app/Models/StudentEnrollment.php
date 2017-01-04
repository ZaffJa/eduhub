<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class StudentEnrollment extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $fillable = ['user_id','uploaded_file_path','course_id','status','institution_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
