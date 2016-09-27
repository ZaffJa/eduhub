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
                  <dd> {{ $course->periodType != null ? $course->periodType->name : 'Not Defined' }} </dd>
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
                  <dd> {{$course->credit_hours != null ? $course->credit_hours : "Credit hours not added"}} </dd>
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

                  <dt><h3>Course Fee</h3></dt>
                  <dd></dd>
                  
                  <dt>Alumini Fee</dt>
                  <dd>{!! isset($courseFee[0]) ? $courseFee[0]->amount : 'Fee not added' !!} </dd>
                  <dt>Co-curriculum Fee</dt>
                  <dd>{!! isset($courseFee[1]) ? $courseFee[1]->amount : 'Fee not added' !!}</dd>
                  <dt>Residential Fee</dt>
                  <dd>{!! isset($courseFee[2]) ? $courseFee[2]->amount : 'Fee not added' !!}</dd>
                  <dt>Service Fee</dt>
                  <dd>{!! isset($courseFee[3]) ? $courseFee[3]->amount : 'Fee not added' !!}</dd>
                  <dt>Tuition Fee</dt>
                  <dd>{!! isset($courseFee[4]) ? $courseFee[4]->amount : 'Fee not added' !!}</dd>
                  <dt>Total Fee</dt>
                  <dd>{{ $totalFee != 0 ? $totalFee : 'Fee not added' }}</dd>
                  <hr>
                
                </dl>
              </div>

              <div class="box-footer">
                <div class="col-md-9">
                  </div>
                    <div class="col-md-3">
                 <a href="{!! route('client.course.view') !!}" class="btn btn-warning">Cancel</a>

                 <button value="{!! route('client.course.delete', $course->id) !!}" class="btn btn-danger confirmDeleteBtn">Delete</button>

                 <a href="{!! route('client.course.edit',$course->id) !!}" class="btn btn-info">Edit</a>
                </div>
                </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

</div>











@endsection
