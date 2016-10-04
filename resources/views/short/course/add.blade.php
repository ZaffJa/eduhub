@extends('short.layout.headerApp')


@section('title', 'Short Course')
@section('headbar', 'Add Course')
@section('content2')
<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <div class="col-md-2">
          <h3>Add Short Course</h3>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-2">
          <label>Course Name</label>
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
          <textarea type="text" value="" name="name_last" placeholder="Last Name"></textarea>
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Period MIN
        </label>
        </div>
        <div class="col-md-3">
          <input type="number" value="" placeholder="Period MIN">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Period MAX
        </label>
        </div>
        <div class="col-md-3">
          <input type="number" value="" placeholder="Period MAX">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Credit Hours
        </label>
        </div>
        <div class="col-md-3">
          <input type="number" value="" >
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Approved
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Approved">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Accredited
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Accredited">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Commencement
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Commencement">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Qualification
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Qualification">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            MQA reference number
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="MQA No">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Course Code
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Course code">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Start Date
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Start Date" >
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Course Length
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Course Length">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Attendance
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Attendance">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Class Size
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Class Size">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Fee
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Fee">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Exam fee
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Exam Fee">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Note
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Note">
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Language
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Language">
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
          <textarea type="text" value="" placeholder="Learning outcome"></textarea>
        </div>

      </div>
      <div class="row">
        <div class="col-md-2">
        <label>
            Location
        </label>
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12">
          <input type="text" value="" placeholder="Location">
        </div>

      </div>
      </div>
      <div class="box-footer">

        <div class="col-md-offset-9">
                <a href="" class="btn btn-warning ">Cancel</a>
                <a href=""><button class='btn btn-success '>Add</button></a>
        </div>

      </div>

    </div>
</div>
</div>
@endsection
