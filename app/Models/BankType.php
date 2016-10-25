<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class BankType extends Model
{
    use AuditingTrait, SoftDeletes;

   	protected $fillable = ['name'];
}

