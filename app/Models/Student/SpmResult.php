<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class SpmResult extends Model
{
	use AuditingTrait, SoftDeletes;
	
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo('App\Models\Student\SpmSubject','spm_subject_id','id');
    }
}
