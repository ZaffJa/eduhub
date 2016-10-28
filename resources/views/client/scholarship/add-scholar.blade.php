@extends('client.layout.headerLayout')
 @section('title', 'Scholarship')
  @section('headbar', 'Add Scholarship')
   @section('content2')

<div class=col-lg-12>
    <div class="box box-primary">
          <form role=form method=post action="{{route('client.add.scholarship')}}" autocomplete="off" enctype="multipart/form-data">
            <div class=box-body>
                <div class=form-group>
                    <label>Name</label>
                    <input type="text" name="scholarship_name">
                </div>
                <div class=form-group>
                    <label>Description</label>
                    <textarea name="description" rows="12" required></textarea>
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
                    <input name="website" type="text" required>
                </div>
                <div class=form-group>
                    <label>Opening Date</label>
                    <input name="opening" type="date" required>
                </div>
                <div class=form-group>
                    <label>Closing Date</label>
                    <input name="closing" type="date" required>
                </div>
                <div class=form-group>
                    <label>Upload Image</label>
                    </br>
                    <input name="file_form" type="file">
                    <p>File &nbsp;only accept - <span id="only-accept">jpeg,png,jpg,gif,svg</span></p>
                </div>
                <input type="hidden" name="file_type" id="file-type" value="jpeg,png,jpg,gif,svg">
                {{csrf_field()}}
            </div>
            <div class=box-footer>
              <div class="col-lg-10">
              </div>
              <div class="col-lg-2">
              <a class="btn btn-warning" href="{{action('ScholarshipController@view')}}">Cancel</a>
              <button class="btn btn-success">Submit</button>
            </div>
            </div>
        </form>
        </div>
    </div>

<script type="text/javascript">
  $('#type-id').on('change',function(){
    $val = $(this).val();
    $only = $('#only-accept');

    if($val == 1){
        $only.html('jpeg,png,jpg,gif,svg');
        $('#file-type').val('jpeg,png,jpg,gif,svg');
    }else if($val == 3){
        $only.html('doc,docx,pdf');
        $('#file-type').val('doc,docx,pdf');
    }
  });

  $(".datepicker").datepicker();
</script>
@endsection
