@extends('client.layout.headerLayout')
@section('title', 'View Enrollment')
@section('headbar', 'Enrollments') @section('content2')
    <div class="box box-primary">
        <form action="{{ action('EnrollmentController@upload') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <h2><strong>Upload Enrollment Form</strong></h2>
            <div class="row">
                <div class="col-md-10">
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" style="display: none;" name="enrollment_form" required>
                    </span>
                        </label>
                        <input type="text" class="form-control" readonly style="margin-left: 10px;">
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>

        </form>
    </div>
    <div class="box box-primary">
        List
    </div>

    <script>
        $(function () {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function () {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready(function () {
                $(':file').on('fileselect', function (event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if (input.length) {
                        input.val(log);
                    } else {
                        if (log) alert(log);
                    }
                });
            });
        });
    </script>
@endsection
