<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Facility extends Model
{
    Use SoftDeletes;

    protected $fillable = ['institution_id' ,'parent_id', 'name', 'type', 'capacity'];
    protected $dates = ['deleted_at'];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\FacilityType');
    }
}
