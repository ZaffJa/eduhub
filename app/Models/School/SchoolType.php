<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class SchoolType extends Model
{
    use SoftDeletes,AuditingTrait;

    protected $guarded = [];
}
