<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use Notifiable;

    protected $guarded = [];

    public function ic()
    {
        return $this->belongsTo('App\Models\Institution');
    }
}
