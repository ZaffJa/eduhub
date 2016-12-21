@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Edit course')
@section('content2')
    <style>
        .row{
           margin-top: 30px;
        }
    </style>
    <div class="box box-primary">
        <form method="post" autocomplete="off" class="confirmLeaveBeforeSave">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <h2><strong>Course Information</strong></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Course Name
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" value="{!! $course->name_en !!}" name="name_en"
                                       placeholder="English Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <input type="text" value="{!! $course->name_ms !!}" name="name_ms"
                                       placeholder="Malay Name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Faculty
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        {{ Form::select('faculty_id', $faculties, isset($course->faculty) ? $course->faculty->id : 0,['class'=> 'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Level
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        {{ Form::select('level_id', $levels, isset($course->level->id) ? $course->level->id : 0 , ['class'=> 'form-control']) }}
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        Mode
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        {{ Form::select('mode_id', $modes, $course->mode->id, ['class'=> 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Period Min
                    </div>
                    <div class="col-md-10">
                        <input type="number" value="{!! $course->period_value_min !!}" name="period_value_min"
                               placeholder="Min credit hour" maxlength="3" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        Period Max
                    </div>
                    <div class="col-md-10">
                        <input type="number" value="{!! $course->period_value_max !!}" name="period_value_max"
                               placeholder="Max credit hour" maxlength="3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Credit Hour
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{!! $course->credit_hours !!}" name="credit_hours"
                               placeholder="Credit hour needed to pass this course">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Duration
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        {{ Form::select('period_type_id',$period_type, $course->period_type_id , ['class'=> 'form-control'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Qualification Entry
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{!! $course->qualification !!}" name="qualification"
                               placeholder="Min qualification">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Approved
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{!! $course->approved !!}" name="approved" placeholder="Approved">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Accredited
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{!! $course->accredited !!}" name="accredited"
                               placeholder="Accredited">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Commencement
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{!! $course->commencement !!}" name="commencement"
                               placeholder="Commencement">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Field
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        {{ Form::select('nec_code', $nec, $course->nec_code, ['class'=> 'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        MQA Reference No
                    </div>
                    <div class="col-md-10">
                        <input type="text" value="{!! $course->mqa_reference_no !!}" name="mqa_reference_no"
                               placeholder="MQA Reference No">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h2><strong>Course Fee</strong></h2>
                    </div>
                </div>
                @if($courseFee->count())
                    <div class="row">
                        <div class="col-md-2">
                            Alumni Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="alumni"
                                   value="{!! isset($courseFee[0]) ? $courseFee[0]->amount : '' !!}"
                                   placeholder="Alumni Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Co-curriculum Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="coq"
                                   value="{!! isset($courseFee[1]) ? $courseFee[1]->amount : '' !!}"
                                   placeholder="Co-curriculum Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Residential College Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="residential"
                                   value="{!! isset($courseFee[2]) ? $courseFee[2]->amount : '' !!}"
                                   placeholder="Residential College Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Service Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="service"
                                   value="{!! isset($courseFee[3]) ? $courseFee[3]->amount : '' !!}"
                                   placeholder="Service Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Tuition Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="tuition"
                                   value="{!! isset($courseFee[4]) ? $courseFee[4]->amount : '' !!}"
                                   placeholder="Tuition Fee">
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-2">
                            Alumni Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="alumni" value="" placeholder="Alumni Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Co-curriculum Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="coq" value="" placeholder="Co-curriculum Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Residential College Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="residential" value="" placeholder="Residential College Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Service Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="service" value="" placeholder="Service Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Tuition Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="tuition" value="" placeholder="Tuition Fee">
                        </div>
                    </div>
                @endif

            </div>
            <div class="box-footer">

                {{ csrf_field() }}
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <a href="{!! route('client.course.view.course', $course->id ) !!}"
                       class="btn btn-warning ">Cancel</a>
                    <a href="{!! route('client.course.update',$course->id) !!}">
                        <button class='btn btn-success '>Update</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

@endsection
