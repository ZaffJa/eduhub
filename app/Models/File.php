<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'user_id', 'institution_id', 'faculty_id', 'course_id', 'type_id',
        'category_id', 'filename', 'path', 'mime', 'type', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function institution()
    {
        return $this->belongsTo('App\Models\Institution');
    }

    public function faculty()
    {
        return $this->belongsTo('App\Model\Faculty');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\FileType');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\FileCategory');
    }
}
