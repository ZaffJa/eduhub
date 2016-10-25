<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Level extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $table = 'short_levels';
    protected $fillable = ['name'];
}
