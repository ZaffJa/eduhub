@extends('short.layout.headerApp')


@section('title', 'Short Course')
@section('headbar', 'Add Course')
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
          <h3>Add Short Course</h3>
        </div>
      </div>
      <div class="box-body">
        <form method="post" class="confirmLeaveBeforeSave">
        <div class="row">
          <div class="col-md-2">
          <label>Course Name<span class="required">*</span></label>
          </div>
          <div class="col-md-10">
            <input type="text" value="" name="name_en" placeholder="English Name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
            <input type="text" value="" name="name_ms" placeholder="Malay Name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
            Description
          </label>
          </div>
          <div class="col-md-10">
            <br>
            <textarea type="text" name="description" placeholder="Short Course Description"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Period MIN
          </label>
          </div>
          <div class="col-md-3">
            <input type="number" name="period_value_min" placeholder="Period MIN">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Period MAX
          </label>
          </div>
          <div class="col-md-3">
            <input type="number" name="period_value_max" placeholder="Period MAX">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Period Type
          </label>
          </div>
          <div class="col-md-3">
              </br>
            {{ Form::select('period_type_id', $periodType) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Credit Hours
          </label>
          </div>
          <div class="col-md-3">
            <input type="number" name="credit_hours" placeholder="Credit Hours" >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Approved
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="approved" placeholder="Approved">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Accredited
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="accredited" placeholder="Accredited">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Commencement
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="commencement" placeholder="Commencement">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Qualification
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="qualification" placeholder="Qualification">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              MQA reference number
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="mqa_reference_no" placeholder="MQA No">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Course Level
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
              </br>
              {{ Form::select('level_id', $levelType) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Course Field
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
              </br>
              {{ Form::select('field_id', $fieldType) }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Course Code
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="code" placeholder="Course code">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Start Date
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="start_date" placeholder="Start Date" >
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Course Length
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="length" placeholder="Course Length">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Attendance
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="attendance" placeholder="Attendance">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Class Size
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="class_size" placeholder="Class Size">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Fee
          </label><span class="required">*</span>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input name="price" type="number" value="" placeholder="Fee">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Exam fee
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="number" name="exam_fee" placeholder="Exam Fee">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Additional Note
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="note" placeholder="Note">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Language
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="language" placeholder="Language">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              HRDF Scheme
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="number" name="hrdf_scheme" placeholder="HRDF Scheme">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Location
          </label><span class="required">*</span>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input name="location" type="text" value="" placeholder="Location">
          </div>
        </div>
        <div class="row">
          <div class="col-md-2">
          <label>
              Learning Outcome
          </label>
          </div>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <br>
            <textarea type="text" name="learning_outcome" placeholder="Learning outcome"></textarea>
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
@endsection