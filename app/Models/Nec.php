<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class Nec extends Model
{
    use AuditingTrait;

    protected $table = 'nec';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $fillable = ['code', 'parent_code', 'field'];

    public function parent()
    {
        return $this->belongsTo('App\Models\NecNarrowField', 'parent_code', 'code');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
