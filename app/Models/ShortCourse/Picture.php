<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;

    protected $table = 'short_pictures';
    protected $fillable = ['course_id', 'filename'];

}
