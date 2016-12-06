<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolStream extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}
