<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyMode extends Model
{
    use SoftDeletes;

    protected $table = 'short_modes';
    protected $fillable = ['name'];
}
