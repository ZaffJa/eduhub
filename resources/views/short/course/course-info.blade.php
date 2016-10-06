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
                <h2 class="box-title"> {{ $course->name_en }} </h2>
             </br>
                <h2 class="box-title"> {{ $course->name_ms }} </h2>
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
                	<dd>{{ $course->code }}</dd>
                	<hr>
                	<dt>Credit Hours</dt>
                	<dd>{{ $course->credit_hours }}  </dd>
                	<hr>
                	<dt>Course Description</dt>
                	<dd>{{ $course->description }}  </dd>
                	<hr>
                	<dt>Approved</dt>
                	<dd>{{ $course->approved }} </dd>
                	<hr>
                	<dt>Accredited</dt>
                	<dd>{{ $course->accredited }}  </dd>
                	<hr>
                	<dt>Commencement</dt>
                	<dd>{{ $course->commencement }}  </dd>
                	<hr>
                	<dt>Qualification</dt>
                	<dd>{{ $course->qualification}}  </dd>
                	<hr>
                	<dt>MQA Reference No.</dt>
                	<dd>{{ $course->mqa_reference_no}}  </dd>
                	<hr>
                	<dt>Course Start Time</dt>
                	<dd>{{ $course->start_date }} </dd>
                	<hr>
                	<dt>Course Length</dt>
                	<dd>{{ $course->length }}  </dd>
                	<hr>
                	<dt>Course Attendance</dt>
                	<dd>{{ $course->attendance }}  </dd>
                	<hr>
                	<dt>Course Class Size</dt>
                	<dd>{{ $course->class_size }}  </dd>
                	<hr>
                	<dt>Course Language</dt>
                	<dd>{{ $course->language }}  </dd>
                	<hr>
                	<dt>Course Fee</dt>
                	<dd>{{ $course->price }}  </dd>
                	<hr>
                	<dt>Course Exam Fee</dt>
                	<dd>{{ $course->exam_fee }}  </dd>
                	<hr>
                	<dt>Course HRDF Scheme</dt>
                	<dd>{{ $course->hrdf_scheme }}  </dd>
                	<hr>
                	<dt>Course Learning Outcome</dt>
                	<dd>{{ $course->learning_outcome }}  </dd>
                	<hr>
                	<dt>Course Location</dt>
                	<dd>{{ $course->location }}  </dd>
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