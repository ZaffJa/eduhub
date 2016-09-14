@extends('client.layout.headerLayout') @section('title', 'Faculty') @section('headbar', 'Faculty') @section('content2') @if ($faculties->isEmpty())
<p> There is no faculties. </p>
@else

<div class="box box-primary">
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control input-sm" placeholder="Search a faculty" aria-controls="example1" id="search">
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th>Faculty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faculties as $faculty)
                            <tr>

                                <td> {!! $faculty->name !!} </td>
                                <td>
                                    <a href="{!! action('FacultyController@edit', $faculty->id) !!}" class='btn btn-xs btn-primary'>Edit</a>
                                    <button value="{!! action('FacultyController@delete', $faculty->id) !!}" class='btn btn-xs btn-danger confirmDeleteBtn'>Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$faculties->render()}}
                </div>
            </div>
        </div>
        <a href="{!! route('client.faculty.add') !!}" class="float">
            <i class="fa fa-plus my-float"></i>
        </a>
        <div class="label-container">
            <div class="label-text">Add Faculty</div>
            <i class="fa fa-arrow- label-arrow"></i>
        </div>
    </div>
</div>


<script type="text/javascript">
  $('#search').autocomplete({
    source : "{{route('client.faculty.search')}}"
  });
</script>
@endif @endsection
