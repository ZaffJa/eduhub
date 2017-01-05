@extends('admin.layout.app')
@section('title', 'Course')
@section('headbar', 'Institution Form')
@section('content')

    <div class="box box-primary">
        <div class="box-body">
            <div class="col-sm-12">
                <form role="form" method="post" action="{{route('client.post.institution')}}"
                      autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Institution Image</label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" type="file" style="display:none;"
                                       onchange="$('#upload-file-info').html($(this).val());" name="file_image">
                                Browse Institution Logo
                            </label>
                            <h4>
                                <div class='label label-info' id="upload-file-info"></div>
                            </h4>
                        </div>
                        <div class="form-group">
                            <label>Institution Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Enter new Institution" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution Abbreviation</label>
                            <input type="text" class="form-control" name="abbreviation"
                                   placeholder="Example: USM" value="{{old('abbreviation')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution Description</label>
                            <textarea name="description">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Established date</label>
                            <input type="text" class="form-control" name="established" id="datepicker"
                                   placeholder="When it is established" value="{{old('established')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution Location</label><br>
                            <input type="text" name="location" value="{{old('location')}}"
                                   placeholder="Example: Skudai/Johor">
                        </div>
                        <div class="form-group">
                            <label>Campus Location</label>
                            <input type="text" class="form-control" name="address"
                                   placeholder="Full address of the campus location"
                                   value="{{old('address')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution
                                Type</label><br>{{ Form::select('type_id', $i,old('type_id'),['class'=>'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="text" class="form-control" name="contact_no"
                                   placeholder="Official institution contact no"
                                   value="{{old('contact_no')}}">
                        </div>
                        <div class="form-group">
                            <label>Fax No</label>
                            <input type="text" class="form-control" name="fax_no"
                                   placeholder="Official institution fax no" value="{{old('fax_no')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution Website</label>
                            <input type="text" class="form-control" name="website"
                                   placeholder="Official institution website" value="{{old('website')}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label> <span class="label label-info"> Add comma for each new email</span>
                            <textarea name="email">{{ old('email') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Public Relation Department Email</label> <span class="label label-info"> Add comma for each new email</span>
                            <textarea
                                    name="public_relations_department_email">{{old('public_relations_department_email')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Student Enrollment Department Email</label> <span class="label label-info"> Add comma for each new email</span>
                            <textarea
                                    name="student_enrollment_department_email">{{old('student_enrollment_department_email')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Corporate Communication Department Email</label> <span class="label label-info"> Add comma for each new email</span>
                            <textarea
                                    name="corporate_communications_department_email">{{old('corporate_communications_department_email')}}</textarea>

                        </div>
                        <div class="form-group">
                            <label>Marketing Department Email</label> <span class="label label-info"> Add comma for each new email</span>
                            <textarea name="marketing_department_email">{{old('marketing_department_email')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Examination Board</label>
                            <input type="text" class="form-control" name="examination_board"
                                   placeholder="Examination board" value="{{old('examination_board')}}">
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" class="form-control" name="remarks" placeholder="Remarks"
                                   value="{{old('remarks')}}">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <script type="text/javascript">
        $(document).ready(function () {

            CKEDITOR.replace('description');
            $("#datepicker").datepicker();
        });
    </script>
@endsection
