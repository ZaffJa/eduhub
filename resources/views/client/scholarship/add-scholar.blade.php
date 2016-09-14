@extends('client.layout.headerLayout')
 @section('title', 'Scholarship')
  @section('headbar', 'Add Scholarship')
   @section('content2')
<div class=col-lg-12>
    <div class="box box-primary">
        <div class='row box-body'>



          <form role=form method=post action="{{route('add.scholarship')}}" autocomplete="off" enctype="multipart/form-data"
            <div class=box-body>
                <div class=form-group>
                    <label>Name</label>
                    <input type="text" name="scholarship_name">
                </div>
                <div class=form-group>
                    <label>Address</label>
                    <input type="text" name="scholarship_address">
                </div>
                <div class=form-group>
                    <label>Select</label>
                    {{Form::select('type_id',$filetypes,null,['id'=>'type-id'])}}
                </div>
                <div class=form-group>
                    <label>Contact</label>
                    <input name="scholarship_contact" type="number">
                </div>
                <div class=form-group>
                    <label>Website</label>
                    <input name="website" type="text">
                </div>
                <div class=form-group>
                    <label>File &nbsp;only accept - <span id="only-accept">jpeg,png,jpg,gif,svg</span></label>
                    <input name="file_form" type="file">
                </div>
                <input type="hidden" name="file_type" id="file-type" value="jpeg,png,jpg,gif,svg">
                {{csrf_field()}}
            </div>
            <div class=box-footer><button class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{action('FacultyController@view')}}">Cancel</a>
            </div>
        </form>
        </div>
    </div>
</div>
<script type="text/javascript">
  $('.alert-danger').hide(3000);

  $('#type-id').on('change',function(){
    $val = $(this).val();
    $only = $('#only-accept');
    if($val == 1){
      $only.html('jpeg,png,jpg,gif,svg');
      $('#file-type').val('jpeg,png,jpg,gif,svg');
    }else if($val == 2){
      $only.html('mp4,avi,flv');
      $('#file-type').val('mp4,avi,flv');
    }else if($val == 3){
      $only.html('doc,pdf');
      $('#file-type').val('doc,pdf');
    }
  });
</script>
@endsection
