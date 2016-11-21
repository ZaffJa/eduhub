<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\AuditingTrait;

class Enquiry extends Model
{
    use AuditingTrait, Notifiable, SoftDeletes;

    protected $guarded = [];

    public function ic()
    {
        return $this->belongsTo('App\Models\Institution');
    }
}
