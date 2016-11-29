<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class ActivateShortProvider extends Model
{
    use AuditingTrait, SoftDeletes;
        
    protected $fillable = [
        'email','token'
    ];
}
