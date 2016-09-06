<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFee extends Model
{

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