<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class FileCategory extends Model
{
	use AuditingTrait;

    protected $fillable = ['name'];
}
