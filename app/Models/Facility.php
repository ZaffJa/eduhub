<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['institution_id' ,'parent_id', 'name', 'type', 'capacity'];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\FacilityType');
    }
}
