<table class="table" id="spm_table">
    <thead>
        <tr>
            <th>Subject Name</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($core_spm_subjects as $core)
            <tr>
                <td>
                    {!! Form::select('name[]', $spm_subjects, isset($core->spm_subject_id) ? $core->spm_subject_id : $core,['placeholder'=>'Select a subject','required']); !!}
                </td>
                <td>
                    {!! Form::select('grade[]', $grades, isset($core->grade) ? $core->grade : null,['placeholder'=>'Select a grade','required','class'=>'add_child_record']); !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!!Form::submit( $submitButton,['class'=>'btn btn-success']); !!}
{!!Form::button( 'Add Record!',['class'=>'btn btn-default','id'=>'add_spm_record']); !!}
{!!Form::button( 'Remove Record!',['class'=>'btn btn-danger','id'=>'remove_spm_record']); !!}


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
