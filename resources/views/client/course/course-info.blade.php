@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Course Info')
@section('content2')

<div>

          <div class="col-lg-12">
            <div class="box box-solid">
              <div class="box-header with-border" style="margin-left:2%">
                <i class="fa fa-book"></i>

                <h1 class="box-title"> {{ $course->name_en}} </h1>
              </br>
                <i class="fa fa-book"></i>
                <h1 class="box-title"> {{ $course->name_ms}} </h1>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="margin-left:2%; font-size:125%">
                <dl class="dl-horizontal">
                  <dt>Faculty Name</dt>
                  <dd> {{ $course->faculty != null ? $course->faculty->name : 'Not Defined' }} </dd>
                  <hr>
                  <dt>Level</dt>
                  <dd> {{ $course->level != null ? $course->level->name : 'Not Defined' }} </dd>
                  <hr>
                  <dt>Period</dt>
                  <dd> {{ $course->periodType =! null ? $course->periodType->name : 'Not Defined' }} </dd>
                  <hr>
                  <dt>Mode</dt>
                  <dd> {{ $course->mode != null ? $course->mode->name : 'Not Denfined' }} </dd>
                  <hr>
                  <dt>Name(English)</dt>
                  <dd> {{ $course->name_en }} </dd>
                  <hr>
                  <dt>Name(Malay)</dt>
                  <dd> {{ $course->name_ms }} </dd>
                  <hr>
                  <dt>Period Min</dt>
                  <dd> {{ $course->period_value_min }} </dd>
                  <hr>
                  <dt>Period Max</dt>
                  <dd>  {{ $course->period_value_max }} </dd>
                  <hr>
                  <dt>Credit Hour</dt>
                  <dd> {{ $course->credit_hours }} </dd>
                  <hr>
                  <dt>Approved</dt>
                  <dd> {{ $course->approved }} </dd>
                  <hr>
                  <dt>Accredited</dt>
                  <dd> {{ $course->accredited }} </dd>
                  <hr>
                  <dt>Commencement</dt>
                  <dd> {{ $course->commencement }} </dd>
                  <hr>
                  <dt>Qualification</dt>
                  <dd> {{ $course->qualification }} </dd>
                  <hr>
                  <dt>MQA Refference Number</dt>
                  <dd> {{ $course->mqa_reference_no }} </dd>
                  <hr>
                </dl>

              </div>
              <div class="box-footer">
                 <a href="{!! route('client.course.view') !!}" class="btn btn-warning">Cancel</a>
                 <a href="{!! route('client.course.edit',$course->id) !!}" class="btn btn-info">Update</a>
                 <a href="{!! route('client.course.delete', $course->id) !!}" class="btn btn-danger">Delete</a>
                </div>

              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

</div>











@endsection