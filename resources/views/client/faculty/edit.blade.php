@extends('client.layout.headerLayout')

@section('title', 'Faculty')
@section('headbar', 'Edit Faculty')
@section('content2')

<div class="box">
@foreach ($errors->all() as $error)
<div class="box-header">
  <p>
    Error Message
    <br/>
  <p>
  </div>
@endforeach

@if (session('status'))
<label>
  {{session('status')}}
</label>
@endif
<div class="box-body">
<fieldset>

  <legend>Edit Faculty</legend>
  <form method="post" >
	  <input type="text" name="fac_name" value="{!! $faculty->name !!}">
	  <input type="hidden" name="_token" value="{!! csrf_token() !!}">

	  <a href="{!! route('fac_name',$faculty->id) !!}"><button class="btn btn-info">Update</button></a>
	  <a href="{!! action('FacultyController@view') !!}" class="btn btn-danger">Cancel</a>
  </form>

</fieldset>
</div>
<div class="box">
  <div class="box-body">
<fieldset>

  <legend>Edit Faculty Course</legend>
  <form method="post" >
    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
    <thead>
    <tr role="row">
    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70%;">Course</th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 15%;">Edit</th>
    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 15%;">Delete</th>
    </tr>
    </thead>
    <tbody>

    <tr>
    <td> Cooking show </td>
    <td> <a href=""><button class="btn btn-primary">Edit</button></a></td>
    <td>
    <form method="post" action="">
    <input type="hidden" name="_token" value="">
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    <tr>
    <td> Cooking not </td>
    <td> <a href=""><button class="btn btn-primary">Edit</button></a></td>
    <td>
    <form method="post" action="">
    <input type="hidden" name="_token" value="">
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    <tr>
    <td> Eating show </td>
    <td> <a href=""><button class="btn btn-primary">Edit</button></a></td>
    <td>
    <form method="post" action="">
    <input type="hidden" name="_token" value="">
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    <tr>
    <td> Cleaning show </td>
    <td> <a href=""><button class="btn btn-primary">Edit</button></a></td>
    <td>
    <form method="post" action="">
    <input type="hidden" name="_token" value="">
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
    <th rowspan="1" colspan="1">Faculty</th>
    <th rowspan="1" colspan="1">Edit</th>
    <th rowspan="1" colspan="1">Delete</th>

    </tfoot>
    </table>

  </form>

</fieldset>
</div>
</div>
</div>
@endsection
