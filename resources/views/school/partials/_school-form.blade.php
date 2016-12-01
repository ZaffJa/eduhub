
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="card card-profile">
      <div class="card-header card-background card-background-sub">
          <h2 class="title"><b>Register School</b></h2>

      </div>
      <div class="card-content">
<div class="form-group">
    {{Form::label('name', 'Name')}} {{Form::text('name',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('type', 'Type')}} {{ Form::select('type', ['rendah' => 'Peringkat Rendah', 'menengah' => 'Peringkat Menengah'], null,['class'=>'form-control','required','placeholder'=>'Please select a type']) }}
</div>

<div class="form-group">
    {{Form::label('ppd', 'PPD')}} {{Form::text('ppd',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('code', 'School Code')}} {{Form::text('code',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('address', 'Address')}} {{Form::text('address',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('postcode', 'Post Code')}} {{Form::text('postcode',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('city', 'City')}} {{Form::text('city',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('state', 'State')}} {{Form::text('state',null,['class'=>'form-control','required'])}}
</div>

<div class="form-group">
    {{Form::label('telephone', 'Telephone')}} {{Form::text('telephone',null,['class'=>'form-control','required'])}}
</div>


<div class="form-group">
    {{Form::label('fax', 'Fax')}} {{Form::text('fax',null,['class'=>'form-control','required'])}}
</div>

    @include('school.partials._map')
      </div>
      <div class="card-footer">

        {!! Form::submit('Submit',['type'=>'button','class'=>'btn btn-success']) !!} {!! Form::button('Cancel',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}


      </div>
      </div>
</div>


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
