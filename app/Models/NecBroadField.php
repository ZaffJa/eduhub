<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class NecBroadField extends Model
{
    use SoftDeletes;
    use AuditingTrait;

    protected $table = 'nec_broad_fields';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = ['code', 'field', 'slug'];

    public function narrowFields()
    {
        return $this->hasMany('App\Models\NecNarrowField', 'parent_code');
    }
}
