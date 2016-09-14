<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionScholarship extends Model
{
  use SoftDeletes;
  public function institutions()
  {
      return $this->belongsTo('App\Models\Institution','fileable_id','id');
  }
  public function type()
  {
      return $this->belongsTo('App\Models\FileType','type_id');
  }
}
