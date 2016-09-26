@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Edit course')
@section('content2')
<div class="box box-primary">
<style media="screen">
    .col-md-2 {
        text-align: center;
    }

    .row {
        padding-top: 10px;

    }
</style>
<div class="box-body">
<form class=""  method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-2">
        <h3>Course Info</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Course Name
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" value="{!! $course->name_en !!}" name="name_en" placeholder="English Name">
                </div>
            </div>
              <div class="row">
                <div class="col-md-4 ">
                    <input type="text" value="{!! $course->name_ms !!}" name="name_ms" placeholder="Malay Name">
                </div>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Faculty
        </div>
        <div class="col-md-1">
            {{ Form::select('faculty_id', $faculties,$course->faculty->id) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Level
        </div>
        <div class="col-md-1">
            {{ Form::select('level_id', $levels, $course->level->id) }}
        </div>

    </div>
    <div class="row">
        <div class="col-md-2">
            Mode
        </div>
        <div class="col-md-1">
            {{ Form::select('mode_id', $modes, $course->mode->id)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Period Min
        </div>
        <div class="col-md-1">
            <input type="number" value="{!! $course->period_value_min !!}" name="period_value_min" placeholder="Min credit hour">
        </div>

    </div>
    <div class="row">
        <div class="col-md-2">
            Period Max
        </div>
        <div class="col-md-1">
            <input type="number" value="{!! $course->period_value_max !!}" name="period_value_max" placeholder="Max credit hour">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Credit Hour
        </div>
        <div class="col-md-4">
            <input type="text" value="{!! $course->credit_hours !!}" name="credit_hours" placeholder="Credit hour needed to pass this course">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Duration
        </div>
        <!-- <div class="col-md-2">
            <input type="number"  name="period" placeholder="Duration of study">
        </div> -->
        <div class="col-md-1">
            {{ Form::select('period_type_id',$period_type, $course->period_type_id)}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Qualification Entry
        </div>
        <div class="col-md-4">
            <input type="text" value="{!! $course->qualification !!}" name="qualification" placeholder="Min qualification">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Approved
        </div>
        <div class="col-md-4">
            <input type="text" value="{!! $course->approved !!}" name="approved" placeholder="Approved">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Accredited
        </div>
        <div class="col-md-4">
            <input type="text" value="{!! $course->accredited !!}" name="accredited" placeholder="Accredit">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Commencement
        </div>
        <div class="col-md-4">
            <input type="text" value="{!! $course->commencement !!}" name="commencement" placeholder="Commencement">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Field
        </div>
        <div class="col-md-4">
            {{ Form::select('nec_code', $nec, $course->nec_code) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            MQA Reference No
        </div>
        <div class="col-md-4">
            <input type="text" value="{!! $course->mqa_reference_no !!}" name="mqa_reference_no" placeholder="MQA Reference No">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h3>Course Fee</h3>
        </div>
    </div>
    @if($courseFee->count())
        <div class="row">
            <div class="col-md-2">
            Alumni Fee
            </div>
            <div class="col-md-4">
                <input type="number" name="alumni" value="{!! isset($courseFee[0]) ? $courseFee[0]->amount : '' !!}"  placeholder="Alumni Fee">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            Cocuriculum Fee
            </div>
            <div class="col-md-4">
                <input type="number" name="coq" value="{!! isset($courseFee[1]) ? $courseFee[1]->amount : '' !!}" placeholder="Cocuriculum Fee">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            Residential College Fee
            </div>
            <div class="col-md-4">
                <input type="number" name="residential" value="{!! isset($courseFee[2]) ? $courseFee[2]->amount : '' !!}" placeholder="Residential College Fee">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            Service Fee
            </div>
            <div class="col-md-4">
                <input type="number" name="service" value="{!! isset($courseFee[3]) ? $courseFee[3]->amount : '' !!}" placeholder="Service Fee">
            </div>
        </div>     
        <div class="row">
            <div class="col-md-2">
            Tuition Fee
            </div>
            <div class="col-md-4">
                <input type="number" name="tuition" value="{!! isset($courseFee[4]) ? $courseFee[4]->amount : '' !!}" placeholder="Tuition Fee">
            </div>
        </div>
           @endif
<!--     <div class="row">
        <div class="col-md-2">
            Course Description
        </div>
        <div class="col-md-4">
            <input type="text" name="course-description" placeholder="Detailed description of the course">
        </div>
    </div> -->


</div>
<div class="box-footer">

        {{ csrf_field() }}
<div class="col-md-10">
</div>
<div class="col-md-2">
        <a href="{!! route('client.course.view.course', $course->id ) !!}" class="btn btn-warning ">Cancel</a>
        <a href="{!! route('client.course.update',$course->id) !!}"><button class='btn btn-success '>Update</button>
        </a>
</div>

</form>
</div>
</div>
@endsection
