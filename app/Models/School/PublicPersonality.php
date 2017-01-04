<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class PublicPersonality extends Model
{
    use AuditingTrait, SoftDeletes;
    protected $guarded = [];
}
