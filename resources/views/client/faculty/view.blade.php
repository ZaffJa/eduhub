@extends('client.layout.headerLayout')

@section('title', 'Faculty')
@section('headbar', 'Faculty')
@section('content2')



@if ($faculties->isEmpty())
  <p> There is no faculties. </p>
@else




<div class="box box-primary">

@if (session('status'))
<div class="box-header ">

   <h4> {{session('status')}}</h4>

</div>
@endif





            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row"><div class="col-sm-6">
                  <div class="dataTables_length" id="example1_length">
                    <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-lg">
                      <option value="10">10</option><option value="25">25</option>
                      <option value="50">50</option><option value="100">100</option>
                    </select> entries</label></div></div><div class="col-sm-6">
                      <div id="example1_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                        </label></div></div></div><div class="row">
                          <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70%;">Faculty</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 15%;">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 15%;">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($faculties as $faculty)
                    <tr>
                      <td> {!! $faculty->name !!} </td>
                      <td> <a href="{!! action('FacultyController@edit', $faculty->id) !!}"><button class="btn btn-primary">Edit</button></a></td>
                      <td>
                      <form method="post" action="{!! action('FacultyController@delete', $faculty->id) !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                     </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th rowspan="1" colspan="1">Faculty</th>
                  <th rowspan="1" colspan="1">Edit</th>
                  <th rowspan="1" colspan="1">Delete</th>

                </tfoot>
              </table></div></div><div class="row">
                <div class="col-sm-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>

              <a href="{!! route('client.faculty.add') !!}" class="float">
              <i class="fa fa-plus my-float"></i>
              </a>
              <div class="label-container">
                <div class="label-text">Add Faculty</div>
                <i class="fa fa-arrow- label-arrow"></i>
              </div>
            </div>
          </div>

@endif

@endsection
