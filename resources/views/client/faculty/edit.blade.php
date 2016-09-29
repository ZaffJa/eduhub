@extends('client.layout.headerLayout')
@section('title', 'Faculty')
@section('headbar', 'Edit Faculty')
@section('content2')

<div class="box">
  <div class="box-body table-responsive no-padding">
    <div class="box-body">
        <fieldset>
            <legend>Edit Faculty</legend>
            <form method="post" class="confirmLeaveBeforeSave">
                <div class="col-md-10">
                  <input type="text" name="fac_name" value="{!! $faculty->name !!}">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                </div>
                <div class="col-md-2">
                  <a href="{!! action('FacultyController@view') !!}" class="btn btn-warning">Cancel</a>
                  <a href="{!! route('fac_name',$faculty->id) !!}"><button class="btn btn-success " style="position: right;">Update</button></a>
              </div>
            </form>
        </fieldset>
    </div>
  </div>
</div>
<div class="box">
    <div class="box-footer">
        <fieldset>
            <legend>Edit Faculty Course</legend>
            <div class="box-body table-responsive no-padding">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $c)
                    <tr>
                        <td>{{$c->name_en}}</td>
                        <td>
                          <a href="{{route('client.course.update',$c->id)}}" role="button" class="btn btn-info">Edit</a>
                          <button value="{{route('client.course.delete',$c->id)}}" class='btn btn-sm btn-danger confirmDeleteBtn'>Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </fieldset>
    </div>
</div>
</div>
@endsection
