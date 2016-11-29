<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class File extends Model
{
    use AuditingTrait, SoftDeletes;
        
    protected $table = 'short_files';
    protected $fillable = [
        'fileable_type', 'fileable_id', 'type_id',
        'category_id', 'filename', 'path', 'mime', 'type', 'description'
    ];

    public function fileable()
    {
      return $this->morphTo();
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
