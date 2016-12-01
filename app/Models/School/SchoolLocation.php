<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class SchoolLocation extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $guarded = [];

}
