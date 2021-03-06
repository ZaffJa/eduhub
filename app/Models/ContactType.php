<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class ContactType extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $fillable = ['public_relations_department_email',
                           'student_enrollment_department_email',
                           'corporate_communications_department_email',
                           'marketing_department_email'];

   protected $casts = ['public_relations_department_email',
                          'student_enrollment_department_email',
                          'corporate_communications_department_email',
                          'marketing_department_email'];


}
