@extends('admin.layout.app') @section('title', 'All Enrollment')

@section('headbar', 'All Enrollment') @section('content')
    <div class="box box-primary">
        <div class="box-body">
            <form action="" class="form-horizontal" role="form">
                <div class="col-md-offset-6 col-md-6">
                    {{ Form::select('filter',['institution'=>'Institution',
                                              'pending'=>'Status - Pending',
                                              'accepted'=>'Status - Accepted',
                                              'rejected'=>'Status - Rejected',
                                              'enrolled'=>'Status - Enrolled',
                                              'confirmed'=>'Status - Confirmed',
                                              ],isset($_GET['filter']) ? $_GET['filter'] : 'institution',
                                              [
                                                'class'=>'form-control',
                                                'style'=>'min-height:40px',
                                                'onchange'=>'this.form.submit()', ]) }}

                </div>
            </form>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Institution Name</th>
                                <th>Student Name</th>
                                <th style="text-align: center">Application Files</th>
                                <th style="text-align: center">Enrolled Proof Files</th>
                                <th style="text-align: center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($studentEnrollments as $enrollment)
                                <tr>
                                    <td>{{ $enrollment->institution->name or null }}</td>
                                    <td>{{ $enrollment->user->name or null}}</td>
                                    <td style="text-align: center">
                                        @if(!empty($enrollment->uploaded_file_path))
                                            <a href="{{ $s3.$enrollment->uploaded_file_path }}" download>
                                                <i class="fa fa-download fa-2x"></i></a>
                                        @else
                                            No files
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if(!empty($enrollment->proof_file_path))
                                            <a href="{{ $s3.$enrollment->proof_file_path }}" download>
                                                <i class="fa fa-download fa-2x"></i></a>
                                        @else
                                            No files
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if($enrollment->status == 0)
                                            <span class="label label-primary">Pending</span>
                                        @elseif($enrollment->status == 1)
                                            <span class="label label-warning">Accepted</span>
                                        @elseif($enrollment->status == 2)
                                            <span class="label label-danger">Rejected</span>
                                        @elseif($enrollment->status == 3)
                                            <button data-target="{{ $enrollment->id }}"
                                                    class="btn btn-default-outline confirm">Confirm Payment
                                            </button>
                                        @elseif($enrollment->status == 4)
                                            <button class="btn btn-success-outline view_payment"
                                                    data-target="{{ $enrollment->payment_details }}">View Payment
                                                Description
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ action('EnrollmentController@confirm') }}" id="form" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="payment_details" id="payment_details">
    </form>

@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $(".confirm").on("click", function () {
                var _this = $(this);
                bootbox.prompt("Payment status detail!", function (result) {
                    $("#id").val(_this.data("target"));
                    $("#payment_details").val(result);
                    if (result) {
                        $("#form").submit();
                    }
                });
            });

            $(".view_payment").on("click", function () {
                var _this = $(this);
                bootbox.alert(_this.data("target"));
            });
        })
    </script>
@endsection
