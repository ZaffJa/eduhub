<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class CourseFee extends Model
{
	Use AuditingTrait;

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