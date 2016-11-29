<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class CourseFee extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $fillable = ['course_id', 'fee_id', 'amount'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function fee()
    {
        return $this->belongsTo('App\Models\Fee');
    }
}