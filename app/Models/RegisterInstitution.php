<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterInstitution extends Model
{

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function institution()
    {
      return $this->belongsTo('App\Models\Institution');
    }
}
