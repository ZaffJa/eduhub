<h2>{{$profileHeaderText}}</h2>

<div class="form-group">
    {{Form::label('name', 'Name')}} {{Form::text('name',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'E-Mail Address')}} {{Form::text('email',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('address', 'Address')}} {{Form::text('address',isset($student->address) ? $student->address : null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('school', 'Secondary School')}} {{Form::text('school',isset($student->school) ? $student->school : null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('phone', 'Phone No.')}} {{Form::text('phone',isset($student->phone) ? $student->phone : null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('birthday', 'Birthday')}} {{Form::date('birthday',isset($student->birthday) ? $student->birthday : null,['class'=>'form-control'])}}
</div>

<div class="input-group">
    <label class="input-group-btn">
        <span class="btn btn-primary">
            Edit Profile Picture&hellip;
            <input type="file" style="display: none;" name="image">
        </span>
    </label>
    <input type="text" class="form-control" readonly>
</div>
{!! Form::submit($submitBtnText,['type'=>'button','class'=>'btn btn-default']) !!} {!! Form::button('Cancel',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}



<script type="text/javascript">
$(function() {

// We can attach the `fileselect` event to all file inputs on the page
$(document).on('change', ':file', function() {
var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
input.trigger('fileselect', [numFiles, label]);
});

// We can watch for our custom `fileselect` event like this
$(document).ready( function() {
  $(':file').on('fileselect', function(event, numFiles, label) {

      var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' files selected' : label;

      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }

  });
});

});
</script>
