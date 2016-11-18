@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Edit course')
@section('content2')
<style media="screen">
    .col-md-2 {
        text-align: center;
    }

    .row {
        padding-top: 10px;

    }
</style>
<div class="box box-primary">
    <div class="box-body">
        <form  method="post" autocomplete="off" class="confirmLeaveBeforeSave">
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
                        <div class="col-md-6">
                            <input type="text" value="{!! $course->name_en !!}" name="name_en" placeholder="English Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <input type="text" value="{!! $course->name_ms !!}" name="name_ms" placeholder="Malay Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    Faculty
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    {{ Form::select('faculty_id', $faculties, isset($course->faculty) ? $course->faculty->id : 0) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    Level
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    {{ Form::select('level_id', $levels, $course->level->id) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    Mode
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
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
                <div class="col-md-2 col-sm-12 col-xs-12">
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
                <div class="row">
                    <div class="col-md-2">
                        SPM Qualification Entry
                        <a href="#" data-toggle="tooltip" 
                        title="SPM qualification entry is used for suggesting courses to students after they enter their SPM results,
                        if the field is not filled the course will not be suggested to the students">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-success" onclick="addRow()">Add subject</a>
                        <a class="btn btn-danger" onclick="delRow()">Remove subject</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table id="spmTable">

                        </table>
                    </div>
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
                <div class="col-md-4 col-sm-12 col-xs-12">
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
                    Co-curriculum Fee
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
            @else
                <div class="row">
                    <div class="col-md-2">
                    Alumni Fee
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="alumni" value=""  placeholder="Alumni Fee">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    Co-curriculum Fee
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="coq" value="" placeholder="Cocuriculum Fee">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    Residential College Fee
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="residential" value="" placeholder="Residential College Fee">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    Service Fee
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="service" value="" placeholder="Service Fee">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    Tuition Fee
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="tuition" value="" placeholder="Tuition Fee">
                    </div>
                </div>
                
            @endif
            <div class="row">
                        <div class="col-md-2">
                        <h3>Course Type</h3>
                        <h4>*For student recomendation</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        Type of person
                        </div>
                        <div class="col-md-4">
                            {{ Form::select('personality_type_id', $personality_type, $course->personality_type_id != null ? $course->personality_type_id : null, ['class' => 'my_class']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        Person Description
                        </div>
                        <div class="col-md-6" id='description'>
                        </div>
                    </div>
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
            <a href="{!! route('client.course.update',$course->id) !!}">
                <button class='btn btn-success '>Update</button>
            </a>
        </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $descriptions = [];
    
    @foreach($personality_description as $pd)
        $descriptions.push('{{$pd}}');
    @endforeach


    $('.my_class').change(function () {
        $val = $('.my_class').val() - 1;

        $('#description').text($descriptions[$val]);
    }).change();

    function addRow() {
        var rowCount = $('#spmTable tr').length;
        if (rowCount <= 10) {
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = '{!! Form::select("name[]", $spm_subjects, null,["placeholder"=>"Select a subject"]); !!}';
            cell2.innerHTML = '{!! Form::select("grade[]",$grades, null, ["placeholder"=>"Select a grade"]); !!}';
        }else
        {
            alert('SPM have maximum subject of 10');
        }
    }

    function delRow() {
        table.deleteRow(0);
    }

</script>

@endsection
