<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class SpmResult extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo('App\Models\Student\SpmSubject','spm_subject_id','id');
    }
}
