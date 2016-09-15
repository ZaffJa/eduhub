@extends('client.layout.headerLayout') @section('title', 'Institution Scholarship') @section('headbar', 'Institution Scholarship') @section('content2')
<div class="col-lg-12">
    <div class="box">
        @if ($scholarship == null)
        <div class="box-header">
            <p> There are no scholarship for this institution. </p>
        </div>
        @else
        <div class="box-body">
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>File Type</th>
                        <th>Posted On</th>
                        <th>Action</th>
                        <tr>
                </thead>
                <tbody>
                    @foreach($scholarship as $is)
                    <tr>
                        <td>{{$is->filename}}</td>
                        <td>{{$is->type->name}}</td>
                        <td>{{$is->updated_at->diffForHumans()}}</td>
                        <td>
                            <button value="{{route('client.delete.scholarship',$is->id)}}" class='btn btn-danger confirmDeleteBtn'>Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
          </table>
        </div>
      @endif
  </div>

<a href="{!! route('client.view.add.scholarship') !!}" class="float">
  <i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
  <div class="label-text">Add Scholarship</div>
  <i class="fa fa-arrow- label-arrow"></i>
</div>
</div>
@endsection
