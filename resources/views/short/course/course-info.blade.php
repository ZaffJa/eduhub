@extends('short.layout.headerApp')


@section('title', 'Short Course')
@section('headbar', 'Add Course')
@section('content2')

    <div class="col-lg-12">
        <div class="box box-solid">
            <div class="box-header with-border" style="margin-left:2%">
                <i class="fa fa-book"></i>
                <h1 class="box-title"> Course name</h1>
            </br>
                <h2 class="box-title"> {{ $course->name_en != null ? $course->name_en : '' }} </h2>
             </br>
                <h2 class="box-title"> {{ $course->name_ms != null ? $course->name_en : '' }} </h2>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="margin-left:2%; font-size:125%">
                <dl class="dl-horizontal">
                	<dt>Course Level </dt>
                	<dd> {{ $course->level != null ? $course->level->name : 'No course level' }} </dd>
                	<hr>
                	<dt>Course Mode</dt>
                	<dd> {{ $course->mode != null ? $course->mode->name : 'No course mode' }} </dd>
                	<hr>
                	<dt>Course Field</dt>
                	<dd> {{ $course->field != null ? $course->field->name : 'No course field'}} </dd>
                	<hr>
                	<dt>Course Period (min - max)</dt>
                	<dd>{{ $course->period_value_min }} - {{ $course->period_value_max }} {{ $course->periodType != null ? $course->periodType->name : 'No course period' }}</dd>
                	<hr>
                	<dt>Course Code</dt>
                	<dd>{{ $course->code != null ? $course->code : 'No course code'}}</dd>
                	<hr>
                	<dt>Course Start Time</dt>
                	<dd>{{ $course->start_date != null ? $course->start_date : "No course start date" }} </dd>
                	<hr>
                	<dt>Course Length</dt>
                	<dd>{{ $course->length != null ? $course->length : "No course length"}}  </dd>
                	<hr>
                	<dt>Course Attendance</dt>
                	<dd>{{ $course->attendance != null ? $course->attendance : "No course attendance"}}  </dd>
                	<hr>
                	<dt>Course Class Size</dt>
                	<dd>{{ $course->class_size != null ? $course->class_size : "No course class size"}}  </dd>
                	<hr>
                	<dt>Course Language</dt>
                	<dd>{{ $course->language != null ? $course->language : "No course language"}}  </dd>
                	<hr>
                	<dt>Course Fee</dt>
                	<dd>{{ $course->price != null ? $course->price : "No course price"}}  </dd>
                	<hr>
                	<dt>Course Exam Fee</dt>
                	<dd>{{ $course->exam_fee != null ? $course->exam_fee : "No exam fee"}}</dd>
                	<hr>
                	<dt>Course HRDF Scheme</dt>
                	<dd>{{ $course->hrdf_scheme != null ? $course->hrdf_scheme : "No HRDF scheme"}}</dd>
                	<hr>
                	<dt>Course Learning Outcome</dt>
                	<dd>{{ $course->learning_outcome != null ? $course->learning_outcome : "No learning outcome"}}  </dd>
                	<hr>
                	<dt>Course Location</dt>
                	<dd>{{ $course->location != null ? $course->location : "No course location"}}  </dd>
                	<hr>
                	<dt>Course Additional Notes</dt>
                	<dd>{{ $course->note }}  </dd>
                	<hr>
                </dl>
            </div>
            <div class="box-footer">
                <div class="col-md-offset-10">
                	<a href="{!! route('short.course.view') !!}" class="btn btn-warning">Cancel</a>
                	<a href="{!! route('short.course.edit', $course->id) !!}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
         <!-- /.box-body -->
	</div>
@endsection