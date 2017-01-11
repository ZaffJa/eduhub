@extends('client.layout.headerLayout')
@section('title', 'View Enrollment')
@section('headbar', 'Enrollments') @section('content2')
    <div class="box box-primary" style="padding-left: 10px">
        <div class="row" style="padding: 20px;">
            <div class="col-md-offset-1 col-md-7">
                <form action="{{ action('EnrollmentController@upload') }}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <label style="font-size: 40px; ">Application Form</label>
                    <div class="row">
                        @if(isset(auth()->user()->client->institution->enrollment_file_path))
                            <a href="{{ $s3.auth()->user()->client->institution->enrollment_file_path }}"
                               download class="btn btn-primary btn-lg">
                                Download Application Form
                            </a>

                        @else
                            <h3>
                                You have not uploaded an application form yet.
                            </h3>
                        @endif
                        <label for="files" class="btn btn-success btn-lg">Upload Application Form</label>
                        <input type="file" id="files" class="custom-file-input hidden"
                               name="application_form">
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <form action="{{ action('EnrollmentController@toggleStatus') }}" method="post">
                    {{ csrf_field() }}
                    {{ Form::select('enrollment_status',
                                    [1 => 'Active', 0 => 'Inactive'],
                                    auth()->user()->client->institution->enrollment_status,
                                    ['onchange' => 'this.form.submit()',
                                     'class' => 'form-control']) }}
                </form>
            </div>
        </div>
    </div>
    <div class="box box-body">
        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th>Name</th>
                <th>File</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($enrollments) && count($enrollments) > 0)
                @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->user->name }}</td>
                        <td>
                            <a href="{{ $s3.$enrollment->uploaded_file_path }}" class="btn btn-info" download>Download
                                Form</a>
                            @if(!empty($enrollment->proof_file_path))
                                <a href="{{ $s3.$enrollment->proof_file_path }}" class="btn btn-warning" download>Download
                                    Proof Form</a>
                            @endif
                        </td>
                        <td>{{ $enrollment->created_at->diffForHumans() }}</td>
                        <td>
                            @if($enrollment->status == 0)
                                <a class="btn btn-primary"
                                   href="{{ action('EnrollmentController@accept',$enrollment->id) }}">Accept</a>
                                <a class="btn btn-danger"
                                   href="{{ action('EnrollmentController@reject',$enrollment->id) }}">Reject</a>
                            @elseif($enrollment->status == 1)
                                <a class="btn btn-warning"
                                   href="{{ action('EnrollmentController@enroll',$enrollment->id) }}">Enroll
                                    @elseif($enrollment->status == 2)
                                        <span class="label label-danger">REJECTED</span>
                                    @elseif($enrollment->status == 3)
                                        <span class="label label-primary">ENROLLED</span>
                                    @elseif($enrollment->status == 4)
                                        <span class="label label-default">PAYED</span>
                                    @endif
                                </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    <script>
        $(function () {
            $("#files").on("change", function () {
                var file = $("#files");
                bootbox.confirm('By clicking OK you agree that the form you upload is verified and eduhub will not be responsible for any losses that may occur.', function (result) {
                    if (result) {
                        file.closest("form").submit();
                    }
                });
            });
            // We can attach the `fileselect` event to all file inputs on the page


            // Handle click event for button
            // First send ajax request to update student enrollment status
            // Then hide the div
            //        $(".btn-accepted").on("click", function () {
            //            $(this).closest("td").find(".btn-enrolled").show();
            //            $(this).closest(".status").hide();
            //        });
            //
            //        $(".btn-enrolled").on("click", function (e) {
            //            bootbox.confirm({
            //                message: "By clicking \'Yes\' you will automatically be registered as a short course user. Are you sure you want to proceed with this process? ",
            //                buttons: {
            //                    confirm: {
            //                        label: 'Yes',
            //                        className: 'btn-success'
            //                    },
            //                    cancel: {
            //                        label: 'No',
            //                        className: 'btn-danger'
            //                    }
            //                },
            //                callback: function (result) {
            //                    if (result) {
            //                        $.notify({
            //                            message: "<strong>'Update the student'</strong>"
            //                        }, {
            //                            type: 'success'
            //                        });
            //                    }
            //                }
            //            });
        });
    </script>
@endsection
