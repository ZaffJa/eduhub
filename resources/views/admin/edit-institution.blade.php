@extends('admin.layout.app') @section('title', 'Course') @section('headbar', 'Institution Form') @section('content')

    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <fieldset disabled>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Name</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Abbreviation</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->abbreviation}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Description</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {{$i->description}}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Established date</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->established}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Location</label><br>
                                </div>
                                <div class="col-md-6">
                                    {{$i->location}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Campus Location</label><br>
                                </div>
                                <div class="col-md-6">
                                    {{$i->address}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Type</label>
                                </div>
                                <div class="col-md-6">
                                    {{isset($i->type) ? $i->type->name : ''}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Contact No</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->contact_no}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Fax No</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->fax_no}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Website</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->website}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    {!! $i->email !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Public Relation Department Email</label>
                                </div>
                                <div class="col-md-6">
                                    {!! $i->public_relations_department_email  !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Student Enrollment Department Email</label>
                                </div>
                                <div class="col-md-6">
                                    {!! $i->student_enrollment_department_email !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Corporate Communication Department Email</label>
                                </div>
                                <div class="col-md-6">
                                    {!! $i->corporate_communications_department_email !!}
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Marketing Department Email</label>
                                </div>
                                <div class="col-md-6">
                                    {!! $i->marketing_department_email !!}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Examination Board</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->examination_board}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->remarks}}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection
