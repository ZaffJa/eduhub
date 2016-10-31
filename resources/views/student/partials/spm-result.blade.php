

<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="card">
       <div class="card-header nav nav-pills nav-pills-info nav-stacked" data-background-color="orange">
            <h2>SPM Result</h2>
        </div>
        <div class="card-content">
           <table class="table" id="spm_table">
    <thead>
        <tr>
            <th>Subject Name</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($core_spm_subjects as $core)
        <div class="row">
            <tr>
            <div class="col-md-6 ">
                <td>
                    
                    {!! Form::select('name[]', $spm_subjects, isset($core->spm_subject_id) ? $core->spm_subject_id : $core,['placeholder'=>'Select a subject','required', 'class'=>'form-control','style'=>'background-color:grey;color:white']); !!}
                    
                </td>
                </div>
                <div class="col-md-6 ">
                <td>
                
                    {!! Form::select('grade[]', $grades, isset($core->grade) ? $core->grade : null,['placeholder'=>'Select a grade','required','class'=>'add_child_record form-control','style'=>'background-color:grey;color:white']); !!}
               
                </td>
                </div>
            </tr>
            </div>
        @endforeach
    </tbody>
</table>
        </div>
        <div class="card-footer">
            
{!!Form::submit( $submitButton,['class'=>'btn btn-success']); !!}
{!!Form::button( 'Add Record!',['class'=>'btn btn-default','id'=>'add_spm_record']); !!}
{!!Form::button( 'Remove Record!',['class'=>'btn btn-danger','id'=>'remove_spm_record']); !!}

        </div>
    </div>
</div>
</div>



<script>
    var fixRowCount = $('#spm_table tr').length;
 $('#add_spm_record').on('click',function(){
    var rowCount = $('#spm_table tr').length;
    if(rowCount <= 10){
        $('#spm_table tbody>tr:last').clone(true).insertAfter('.table tbody>tr:last');
        console.log(rowCount);
    }else{
        alert('Stop!!!');
    }
});

 $('#remove_spm_record').on('click',function(){
     var rowCount = $('#spm_table tr').length;
    if(rowCount <= 5 || rowCount <= fixRowCount){
        alert('Stop!!');
    }else{

        $('#spm_table tbody>tr:last').remove();
        console.log(rowCount);
    }
});

</script>
