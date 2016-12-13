@extends('admin.layout.app') @section('title', 'Course') @section('headbar', 'Institution Form') @section('content')

    <div class="box box-primary">
        <div class="box-body">
            <div class="row" id="showView">
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
                                    <label>Institution Slug</label>
                                </div>
                                <div class="col-md-6">
                                    {{$i->slug}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Institution Description</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {!! $i->description !!}
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
                    <button class="btn btn-info" id="btnEdit">Edit</button>
                </div>
            </div>
            <div class="row" id="editForm" style="display: none;">
                <form method="post" autocomplete="off" class="confirmLeaveBeforeSave"
                      action="{{ route('admin.institution.update',$institution->id) }}">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-2">
                                Institution Name
                            </div>
                            <div class="col-lg-10">
                                <input name="name" type="text" value="{!! $institution->name !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Institution Type
                            </div>
                            <div class="col-lg-10">
                                {{ Form::select('type_id', $institution_types ,$institution->type_id,
                                                ['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Abbreviation
                            </div>
                            <div class="col-lg-10">
                                <input name="abbreviation" type="text" value="{!! $institution->abbreviation !!}"
                                       placeholder="Abbreviation">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Slug
                                <i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip"
                                   title="We highly recommend you not to edit this textbox. Only fill this if there is no data in this textbox in the first place."></i>
                            </div>
                            <div class="col-lg-10" id="slugConfirm">
                                <input name="slug" type="text" value="{!! $institution->slug !!}"
                                       placeholder="Abbreviation" aria-hidden="true" data-toggle="tooltip"
                                       title="We highly recommend you not to edit this textbox. Only fill this if there is no data in this textbox in the first place.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Established
                            </div>
                            <div class="col-lg-10">
                                <input name="established" type="text" value="{!! $institution->established !!}"
                                       placeholder="Established">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Location
                            </div>
                            <div class="col-lg-10">
                                <input name="location" type="text" value="{!! $institution->location !!}"
                                       placeholder="Location">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Address
                            </div>
                            <div class="col-lg-10">
                                <input name="address" type="text"
                                       value="{!! $institution->address != null ? $institution->address : 'Addresss not added' !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Website
                            </div>
                            <div class="col-lg-10">
                                <input name="website" type="text"
                                       value="{!! $institution->website != null ? $institution->website : 'Website not added' !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Contact
                            </div>
                            <div class="col-lg-10">
                                <input name="contact_no" type="text"
                                       value="{!! $institution->contact_no != null ? $institution->contact_no : 'Contact not added' !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Fax
                            </div>
                            <div class="col-lg-10">
                                <input name="fax_no" type="text"
                                       value="{!! $institution->fax_no != null ? $institution->fax_no : 'Fax not added' !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Main Branch
                            </div>
                            <div class="col-lg-10">
                                {{ Form::select('parent_id',array(null=>'Please select') + $parent_institution,
                                                isset($institution->parent_id) ? $institution->parent_id : null,
                                                ['class'=>'form-control']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Description
                            </div>
                            <div class="col-lg-10">
                                <textarea name="description">{!! $institution->description !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Email
                            </div>
                            <div class="col-lg-10">
                                <textarea name="email">{!! $institution->email !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Public Relations Department Email
                            </div>
                            <div class="col-lg-10">
                                <textarea
                                        name="public_relations_department_email">{!! $institution->public_relations_department_email !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Corporate Communications Department Email
                            </div>
                            <div class="col-lg-10">
                        <textarea
                                name="corporate_communications_department_email">{!! $institution->corporate_communications_department_email !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Marketing Department Email
                            </div>
                            <div class="col-lg-10">
                                <textarea
                                        name="marketing_department_email">{!! $institution->marketing_department_email !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                Student Enrollment Department Email
                            </div>
                            <div class="col-lg-10">
                        <textarea
                                name="student_enrollment_department_email">{!! $institution->student_enrollment_department_email !!}</textarea>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="col-lg-10">
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-warning " id="showBtn">Cancel</button>
                        <button class='btn btn-success' type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();


            $('#btnEdit').on('click', function () {
                $('#showView').hide();

                $('#editForm').show();
            });

            $('#btnShow').on('click', function () {
                $('#showView').show();

                $('#editForm').hide();
            });

            CKEDITOR.replace('email', {
                height: ['100px']

            });

            CKEDITOR.replace('public_relations_department_email', {
                height: ['100px']

            });

            CKEDITOR.replace('corporate_communications_department_email', {
                height: ['100px']

            });

            CKEDITOR.replace('marketing_department_email', {
                height: ['100px']

            });

            CKEDITOR.replace('student_enrollment_department_email', {
                height: ['100px']

            });

            CKEDITOR.replace('description', {
                height: ['100px']

            });
        });
    </script>
@endsection
