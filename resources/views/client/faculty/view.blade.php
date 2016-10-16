@extends('client.layout.headerLayout') @section('title', 'Faculty') @section('headbar', 'Faculty') @section('content2') @if ($faculties->isEmpty())
<p> There is no faculties. </p>
@else

<div class="box box-primary">
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-1">
                    <form action="{{route('client.faculty.search.result')}}" method="post">
                      <input type="text" class="form-control" placeholder="Search a faculty" name="search_faculty" id="search" style="width:80%">
                        <button type='submit' class='btn btn-md btn-default '>Search</button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-striped">
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
                                    <a href="{!! action('FacultyController@edit', $faculty->id) !!}" class='btn btn-md btn-primary'>Edit</a>
                                    <button value="{!! action('FacultyController@delete', $faculty->id) !!}" class='btn btn-md btn-danger confirmDeleteBtn'>Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
              </div>
                {{$faculties->render()}}
            </div>
        </div>
    </div>
    @endif
    <a href="{!! route('client.faculty.add') !!}" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
    <div class="label-container">
        <div class="label-text">Add Faculty</div>
        <i class="fa fa-arrow- label-arrow"></i>
    </div>
</div>


<script type="text/javascript">
    $('#search').autocomplete({
        source: "{{route('client.faculty.search')}}"
    });
</script>
 @endsection
