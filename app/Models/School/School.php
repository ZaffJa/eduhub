<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{

    use softDeletes;

    protected $casts = [
        'stream' => 'array'
    ];

    protected $guarded = [];

    public function stream()
    {
        return $this->belongsTo('\App\Models\School\SchoolStream','stream_type_id');
    }

    public function typeSchool()
    {
        return $this->belongsTo('\App\Models\School\SchoolType','school_type_id');
    }

    public function location()
    {
        return $this->hasOne('\App\Models\School\SchoolLocation');
    }



}
