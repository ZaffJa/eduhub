<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Student extends Model
{
    use SoftDeletes ,AuditingTrait;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
