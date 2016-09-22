<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class StudyField extends Model
{
	use AuditingTrait;

    protected $fillable = ['name'];
}
