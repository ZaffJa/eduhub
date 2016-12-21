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
                                <input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());" name="file_image">
                                Browse Institution Logo
                            </label>
                            <h4><div class='label label-info' id="upload-file-info"></div></h4>
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
                            <input type="text" class="form-control" name="description"
                                   placeholder="Summarise description of the institution"
                                   value="{{old('description')}}">
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
                            <label>Institution Type</label><br>{{ Form::select('type_id', $i,old('type_id'),['class'=>'form-control']) }}
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
                            <label>Email</label>
                            <textarea name="email" placeholder="Add your emails here.">{{ old('email') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Public Relation Department Email</label>
                            <textarea name="public_relations_department_email">{{old('public_relations_department_email')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Student Enrollment Department Email</label>
                            <textarea name="student_enrollment_department_email">{{old('student_enrollment_department_email')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Corporate Communication Department Email</label>
                            <textarea name="corporate_communications_department_email">{{old('corporate_communications_department_email')}}</textarea>

                        </div>
                        <div class="form-group">
                            <label>Marketing Department Email</label>
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
            CKEDITOR.replace( 'email', {
                height:['100px']

            });

            CKEDITOR.replace( 'public_relations_department_email', {
                height:['100px']

            });

            CKEDITOR.replace( 'corporate_communications_department_email', {
                height:['100px']

            });

            CKEDITOR.replace( 'marketing_department_email', {
                height:['100px']

            });

            CKEDITOR.replace( 'student_enrollment_department_email', {
                height:['100px']

            });
            //     var EmailCounter = 2;
            //     $("#addEmail").click(function() {
            //         if (EmailCounter > 10) return alert("Only 10 textboxes allow"), !1;
            //         var a = $(document.createElement("div")).attr("id", "TextBoxDivEmail" + EmailCounter);
            //         a.after().html("<label>Email " + EmailCounter + ' : </label><input type="email" name="emails[]" id="textbox' + EmailCounter +
            //             '"placeholder="Official email address ' + EmailCounter + '" >'), a.appendTo("#TextBoxesGroupEmail"), EmailCounter++
            //     }), $("#removeEmail").click(function() {
            //         return 1 == EmailCounter ? (alert("No more textbox to remove"), !1) : (EmailCounter--, void $("#TextBoxDivEmail" + EmailCounter).remove())
            //     }), $("#getButtonValue").click(function() {
            //         var a = "";
            //         for (i = 1; i < EmailCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            //         alert(a)
            //     });
            //     var CorporateCommunicationCounter = 2;
            //     $("#addButtonCorporateCommunication").click(function() {
            //         if (CorporateCommunicationCounter > 10) return alert("Only 10 textboxes allow"), !1;
            //         var a = $(document.createElement("div")).attr("id", "TextBoxDivCorporateCommunication" + CorporateCommunicationCounter);
            //         a.after().html("<label>Corporate Communication Department Email " + CorporateCommunicationCounter + ' : </label><input type="email" name="corporate_communications_department_emails[]" id="textbox' +
            //                 CorporateCommunicationCounter + '"placeholder="Official corporate communication email address ' + CorporateCommunicationCounter + '" >'), a.appendTo("#TextBoxesGroupCorporateCommunication"),
            //             CorporateCommunicationCounter++
            //     }), $("#removeButtonCorporateCommunication").click(function() {
            //         return 1 == CorporateCommunicationCounter ? (alert("No more textbox to remove"), !1) : (CorporateCommunicationCounter--, void $("#TextBoxDivCorporateCommunication" + CorporateCommunicationCounter).remove())
            //     }), $("#getButtonValue").click(function() {
            //         var a = "";
            //         for (i = 1; i < CorporateCommunicationCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            //         alert(a)
            //     });
            //     var MarketingDepartmentCounter = 2;
            //     $("#addButtonMarketingDepartment").click(function() {
            //         if (MarketingDepartmentCounter > 10) return alert("Only 10 textboxes allow"), !1;
            //         var a = $(document.createElement("div")).attr("id", "TextBoxDivMarketingDepartment" + MarketingDepartmentCounter);
            //         a.after().html("<label>Marketing Department Email " + MarketingDepartmentCounter + ' : </label><input type="email" name="marketing_department_emails[]" id="textbox' + MarketingDepartmentCounter +
            //             '"placeholder="Official marketing department email address ' + MarketingDepartmentCounter + '" >'), a.appendTo("#TextBoxesGroupMarketingDepartment"), MarketingDepartmentCounter++
            //     }), $("#removeButtonMarketingDepartment").click(function() {
            //         return 1 == MarketingDepartmentCounter ? (alert("No more textbox to remove"), !1) : (MarketingDepartmentCounter--, void $("#TextBoxDivMarketingDepartment" + MarketingDepartmentCounter).remove())
            //     }), $("#getButtonValue").click(function() {
            //         var a = "";
            //         for (i = 1; i < MarketingDepartmentCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            //         alert(a)
            //     });
            //     var StudentEnrollMentDepartmentCounter = 2;
            //     $("#addButtonStudentEnrollMentDepartment").click(function() {
            //         if (StudentEnrollMentDepartmentCounter > 10) return alert("Only 10 textboxes allow"), !1;
            //         var a = $(document.createElement("div")).attr("id", "TextBoxDivStudentEnrollMentDepartment" + StudentEnrollMentDepartmentCounter);
            //         a.after().html("<label>Student Enrollment Department Email " + StudentEnrollMentDepartmentCounter + ' : </label><input type="email" name="student_enrollment_department_emails[]" id="textbox' +
            //                 StudentEnrollMentDepartmentCounter + '"placeholder="Official student enrollment email address ' + StudentEnrollMentDepartmentCounter + '" >'), a.appendTo("#TextBoxesGroupStudentEnrollMentDepartment"),
            //             StudentEnrollMentDepartmentCounter++
            //     }), $("#removeButtonStudentEnrollMentDepartment").click(function() {
            //         return 1 == StudentEnrollMentDepartmentCounter ? (alert("No more textbox to remove"), !1) : (StudentEnrollMentDepartmentCounter--, void $("#TextBoxDivStudentEnrollMentDepartment" + StudentEnrollMentDepartmentCounter).remove())
            //     }), $("#getButtonValue").click(function() {
            //         var a = "";
            //         for (i = 1; i < StudentEnrollMentDepartmentCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            //         alert(a)
            //     });
            //     var PublicRelationDepartmentCounter = 2;
            //     $("#addButtonPublicRelationDepartment").click(function() {
            //         if (PublicRelationDepartmentCounter > 10) return alert("Only 10 textboxes allow"), !1;
            //         var a = $(document.createElement("div")).attr("id", "TextBoxDivPublicRelationDepartment" + PublicRelationDepartmentCounter);
            //         a.after().html("<label>Public  Relation Department Email " + PublicRelationDepartmentCounter + ' : </label><input type="email" name="public_relations_department_emails[]" id="textbox' + PublicRelationDepartmentCounter +
            //             '"placeholder="Official public relation email address ' + PublicRelationDepartmentCounter + '" >'), a.appendTo("#TextBoxesGroupPublicRelationDepartment"), PublicRelationDepartmentCounter++
            //     }), $("#removeButtonPublicRelationDepartment").click(function() {
            //         return 1 == PublicRelationDepartmentCounter ? (alert("No more textbox to remove"), !1) : (PublicRelationDepartmentCounter--, void $("#TextBoxDivPublicRelationDepartment" + PublicRelationDepartmentCounter).remove())
            //     }), $("#getButtonValue").click(function() {
            //         var a = "";
            //         for (i = 1; i < PublicRelationDepartmentCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            //         alert(a)
            //     });

            $("#datepicker").datepicker();
        });
    </script>
@endsection
