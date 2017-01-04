<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class StudentFile extends Model
{
    use AuditingTrait, SoftDeletes;
    protected $guarded = [];
}
