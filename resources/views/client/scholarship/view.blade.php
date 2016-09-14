@extends('client.layout.headerLayout')

@section('title', 'Institution Scholarship')
@section('headbar', 'Institution Scholarship')
@section('content2')
<div class="col-lg-12">
@if (session('status'))
   <div class="box with-border">
    <label>
        {{session('status')}}
    </label>
  </div>
@endif

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
          <button value="{{route('client.delete.scholarship',$is->id)}}" class='btn btn-xs btn-danger' id="confirmDeleteBtn">Delete</a>
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


<div class="modal fade" tabindex="-1" role="dialog" id="confirmDelete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Confirm delete this record?&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        <a href="" role="button" id="parseDeleteRoute" class="btn btn-danger">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">

$('#confirmDeleteBtn').on('click',function(){
    $('#parseDeleteRoute').attr('href',$(this).val());
    $('#confirmDelete').modal();
});

</script>
@endsection
