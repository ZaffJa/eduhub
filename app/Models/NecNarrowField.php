<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NecNarrowField extends Model
{
    protected $table = 'nec_narrow_fields';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = ['code', 'parent_code', 'field'];

    public function parent()
    {
        return $this->belongsTo('App\Models\NecBroadField', 'parent_code', 'code');
    }

    public function necs()
    {
        return $this->hasMany('App\Models\Nec', 'parent_code');
    }
}
