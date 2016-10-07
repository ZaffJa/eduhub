<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Facility extends Model
{
    Use SoftDeletes;
    use AuditingTrait;

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

    public function file()
    {
        return $this->hasOne('App\Models\File','facility_id','id');
    }
}
