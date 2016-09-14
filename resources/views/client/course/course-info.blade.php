@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Course Info')
@section('content2')

<div>

          <div class="col-lg-12">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-book"></i>

                <h3 class="box-title"> {{ $course->name_en}} </h3>
              </br>
                <h3 class="box-title"> {{ $course->name_ms}} </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <dl class="dl-horizontal">
                  <dt>Faculty Name</dt>
                  <dd> {{ $course->faculty != null ? $course->faculty->name : 'Not Defined' }} </dd>
                  <dt>Level</dt>
                  <dd> {{ $course->level != null ? $course->level->name : 'Not Defined' }} </dd>
                  <dt>Period</dt>
                  <dd> {{ $course->periodType =! null ? $course->periodType->name : 'Not Defined' }} </dd>
                  <dt>Mode</dt>
                  <dd> {{ $course->mode != null ? $course->mode->name : 'Not Denfined' }} </dd>
                  <dt>Name(English)</dt>
                  <dd> {{ $course->name_en }} </dd>
                  <dt>Name(Malay)</dt>
                  <dd> {{ $course->name_ms }} </dd>
                  <dt>Period Min</dt>
                  <dd> {{ $course->period_value_min }} </dd>
                  <dt>Period Max</dt>
                  <dd>  {{ $course->period_value_max }} </dd>
                  <dt>Credit Hour</dt>
                  <dd> {{ $course->credit_hours }} </dd>
                  <dt>Approved</dt>
                  <dd> {{ $course->approved }} </dd>
                  <dt>Description lists</dt>
                  <dd> </dd>
                  <dt>Accredited</dt>
                  <dd> {{ $course->accredited }} </dd>
                  <dt>Commencement</dt>
                  <dd> {{ $course->commencement }} </dd>
                  <dt>Qualification</dt>
                  <dd> {{ $course->qualification }} </dd>
                  <dt>MQA Refference Number</dt>
                  <dd> {{ $course->mqa_reference_no }} </dd>
                </dl>

              </div>
              <div class="box-footer">
                 <a href="{!! route('client.course.view') !!}" class="btn btn-danger-outline">Cancel</a>
                 <a href="{!! route('client.course.edit',$course->id) !!}" class="btn btn-primary">Edit</a>
                 <a href="{!! route('client.course.delete', $course->id) !!}" class="btn btn-danger">Delete</a>
                </div>

              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

</div>











@endsection
