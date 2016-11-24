<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="card">
            <div class="class-header"  data-background-color="orange">
                <h2 class="title">SPM Result</h2>
            </div>
            <div class="card-content table-responsive table-full-width">
                <table class="table" id="spm_table">
                    <thead class="text-danger">
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

                                        {!! Form::select('name[]', $spm_subjects, isset($core->spm_subject_id) ? $core->spm_subject_id : $core,['placeholder'=>'Select a subject','required', 'class'=>'btn dropdown-toggle','style'=>'background-color:grey;color:white']) !!}

                                    </td>
                                </div>
                                <div class="col-md-6 ">
                                    <td>

                                        {!! Form::select('grade[]', $grades, isset($core->grade) ? $core->grade : null, ['placeholder'=>'Select a grade','required','class'=>'btn dropdown-toggle', 'style'=>'background-color:grey;color:white']) !!}

                                    </td>
                                </div>
                            </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

                {!!Form::submit( $submitButton,['class'=>'btn btn-success']) !!} {!!Form::button( 'Add Record!',['class'=>'btn btn-info','id'=>'add_spm_record']) !!} {!!Form::button( 'Remove Record!',['class'=>'btn btn-danger','id'=>'remove_spm_record']) !!}
                {!! Form::button('Cancel',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}

            </div>
        </div>
    </div>
</div>



<script>
    var fixRowCount = $('#spm_table tr').length;
    $('#add_spm_record').on('click', function() {
        var rowCount = $('#spm_table tr').length;
        if (rowCount <= 10) {
            $('#spm_table tbody>tr:last').clone(true).insertAfter('.table tbody>tr:last');
            $('#spm_table tbody>tr:last select').prop('disabled',false);
            $('#spm_table tbody>tr:last select').val(null);
        } else {
            alert('Limit SPM subjects reached!');
        }
    });

    $('#remove_spm_record').on('click', function() {
        var rowCount = $('#spm_table tr').length;
        if (rowCount <= 5 || rowCount <= fixRowCount) {
            alert('Limit SPM subjects reached!');
        } else {

            $('#spm_table tbody>tr:last').remove();
            console.log(rowCount);
        }
    });

    $('form').bind('submit', function () {
        $(this).find(':input').prop('disabled',false);
      });
</script>
