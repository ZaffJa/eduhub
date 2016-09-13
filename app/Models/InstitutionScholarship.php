<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionScholarship extends Model
{
  use SoftDeletes;
  public function institutions()
  {
      return $this->hasMany('App\Models\Institution');
  }
}
