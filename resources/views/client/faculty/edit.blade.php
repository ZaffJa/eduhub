@extends('client.layout.headerLayout') @section('title', 'Faculty') @section('headbar', 'Edit Faculty') @section('content2')

<div class="box">

    <div class="box-body">
        <fieldset>

            <legend>Edit Faculty</legend>
            <form method="post">
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
                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
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
                              <a href="{{route('client.course.update',$c->id)}}" role="button" class="btn btn-info btn-sm">Edit</a>
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
