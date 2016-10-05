@extends('short.layout.headerApp')
@section('title', 'Short Course')
@section('headbar', 'Edit Course')
@section('content2')
<style type="text/css">
  .required {
    color: red;
  }
</style>

<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <div class="col-md-2">
          <h3>Edit Short Course</h3>
        </div>
      </div>
      <div class="box-body">
        <form method="post" class="confirmLeaveBeforeSave">
        <div class="row">
          <div class="col-md-2">
          <label>Course Name<span class="required">*</span></label><br>
          </div>
          <div class="col-md-10">
            <input type="text" value="{{ $course->name_en }} " name="name_en" placeholder="English Name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
            <input type="text" value="{{ $course->name_ms}} " name="name_ms" placeholder="Malay Name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>

            Description
          </label>
          </div>
          <div class="col-md-10">
            <br>
            <textarea type="text" name="description" placeholder="Short Course Description">{{$course->description}}</textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Period MIN
          </label>
          </div>
          <div class="col-md-3">
            <input type="number" name="period_value_min" placeholder="Period MIN" value="{{$course->period_value_min}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Period MAX
          </label>
          </div>
          <div class="col-md-3">
            <input type="number" name="period_value_max" placeholder="Period MAX"  value="{{$course->period_value_max}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Period Type
          </label>

          </div>
          <div class="col-md-3">
              </br>
            {{ Form::select('period_type_id', $periodType , $course->period_type_id) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Credit Hours
          </label>
          </div>
          <div class="col-md-3">
            <input type="number" name="credit_hours" placeholder="Credit Hours" value="{{$course->credit_hours}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Approved
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="approved" placeholder="Approved"  value="{{$course->approved}} ">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Accredited
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="accredited" placeholder="Accredited" value="{{$course->accredited}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Commencement
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="commencement" placeholder="Commencement" value="{{$course->commencement}}" >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Qualification
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="qualification" placeholder="Qualification" value="{{$course->qualification}} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              MQA reference number
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="mqa_reference_no" placeholder="MQA No" value="{{$course->mqa_reference_no }} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Course Level
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
              </br>
              {{ Form::select('level_id', $levelType , $course->level_id) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Course Field
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
              </br>
              {{ Form::select('field_id', $fieldType, $course->field_id,["class='test'"]) }}
          </div>
        </div>
        <div class="row" id="others">
          <div class="col-md-10 col-md-offset-2 col-sm-12 col-xs-12">
              <input type="text" value="" placeholder="Other type of field">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Course Code
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="code" placeholder="Course code" value="{{ $course->code }} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Start Time
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="start_date" placeholder="Start Date" value="{{ $course->start_date }} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Course Length
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="length" placeholder="Course Length" value="{{ $course->length }} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Attendance
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="attendance" placeholder="Attendance" value="{{ $course->attendance }} ">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Class Size
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="class_size" placeholder="Class Size" value="{{ $course->class_size }} ">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Fee
          </label><span class="required">*</span>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input name="price" type="text" placeholder="Fee" value="{{$course->price}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Exam fee
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="number" name="exam_fee" placeholder="Exam Fee"  value="{{ $course->exam_fee}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Additional Note
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="note" placeholder="Note" value="{{ $course->note }} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Language
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="language" placeholder="Language" value="{{ $course->language }} " >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              HRDF Scheme
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="number" name="hrdf_scheme" placeholder="HRDF Scheme" value="{{ $course->hrdf_scheme }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Location
          </label><span class="required">*</span>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input name="location" type="text" placeholder="Location" value="{{$course->location}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            <br>
              Learning Outcome
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <br>
            <textarea  type="text" name="learning_outcome" placeholder="Learning outcome"  >{{ $course->learning_outcome }}</textarea>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
            {{csrf_field()}}
            The fields with a red asterix (<span class="required">*</span>) are required to be fill.
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-9">
            <a href=" {!! route('short.course.view') !!} " class="btn btn-warning ">Cancel</a>
            <a href=" {!! route('short.course.store') !!} "><button class='btn btn-success '>Add</button></a>
          </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<script>
$("#others").hide();

$(document).ready(function(){

    $('.test').on('change',function(){
      console.log($(this).val());
      if ($(this).val()=="3"){
      $("#others").show();

    }
    else {
      $("#others").hide();

    }
    });

});
</script>
@endsection
