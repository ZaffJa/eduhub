<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class FacilityType extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $fillable = ['name', 'icon'];
}
