<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class InstitutionType extends Model
{
    use SoftDeletes;
    use AuditingTrait;

    protected $fillable = ['parent_id', 'name', 'slug'];

    public function parent()
    {
        return $this->belongsTo('App\Models\InstitutionType');
    }
}
