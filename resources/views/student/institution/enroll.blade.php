@extends('student.layout.app')
@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <div class="card">
            <div class="card-header-pills " style="background-color: red;">
                <div class="card-title text-center" style="color: white"><h4>Enroll</h4></div>
            </div>
            @if($institution->enrollment_status == 1)
            <div class="card-content">
                <div class="row" style="border-bottom: 1px solid black; margin-bottom: 15px;">
                    <div class="card card-plain">
                        <h2 class="card-title">
                            <i class="fa fa-building"></i>&nbsp;{{ $institution->name or 'Null' }}
                        </h2>
                        <div class="row">
                            <div class="col-md-6" style="text-align: center">
                                <a href="{{ $s3.$institution->enrollment_file_path }}"
                                   download class="btn btn-primary btn-round"> Download Application
                                    Form</a>
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                <form action="{{ action('Student\EnrollmentController@store')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <label for="files" class="btn btn-success btn-fill btn-round">Upload
                                        Application
                                        Form</label>
                                    <input type="file" id="files" class="custom-file-input hidden"
                                           name="application_form">
                                    <input type="hidden" name="slug" value="{{ $institution->slug }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-icon" data-background-color="green">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title" style="padding-left: 10vh;">Enrollment Status</h4>

                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>University Name</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($enrollments) && count($enrollments) > 0)
                                        @foreach($enrollments as $enrollment)
                                            <tr>
                                                <td> {{ $enrollment->institution->name or null }} </td>
                                                <td>
                                                    @if($enrollment->status == 0)
                                                        <span class="label label-primary">Pending</span>
                                                    @elseif($enrollment->status == 1)
                                                        <span class="label label-warning">Accepted</span>
                                                    @elseif($enrollment->status == 2)
                                                        <span class="label label-danger">Rejected</span>
                                                    @elseif($enrollment->status == 3)
                                                        <span class="label label-success">Enrolled</span>
                                                        <button class="btn btn-primary">Verify</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4"> You have not applied in any institution yet.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <h3>This application has been closed.</h3>
            @endif
        </div>
    </div>
    <script>
        $("#files").on("change", function () {
            var file = $("#files");
            bootbox.confirm('By clicking OK you agree.', function (result) {
                if (result) {
                    file.closest("form").submit();
                }
            });
        });
    </script>
@endsection
