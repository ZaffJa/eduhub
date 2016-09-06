<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NecBroadField extends Model
{
    use SoftDeletes;

    protected $table = 'nec_broad_fields';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = ['code', 'field', 'slug'];

    public function narrowFields()
    {
        return $this->hasMany('App\Models\NecNarrowField', 'parent_code');
    }
}
