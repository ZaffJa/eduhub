@extends('client.layout.headerLayout') @section('title', 'Course') @section('headbar', 'Institution Form') @section('content2')
<div class="col-lg-10">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('client.post.institution')}}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Institution Name</label>
                                    <input type="text" class="form-control" name="institution_name" placeholder="Enter new Institution">
                                </div>
                                <div class="form-group">
                                    <label>Institution Abbreviation</label>
                                    <input type="text" class="form-control" name="institution_abbreviation" placeholder="Example: USM">
                                </div>
                                <div class="form-group">
                                    <label>Institution Description</label>
                                    <input type="text" class="form-control" name="institution_description" placeholder="Summarise description of the institution">
                                </div>
                                <div class="form-group">
                                    <label>Established date</label>
                                    <input type="text" class="form-control" name="institution_established_date" id="datepicker" placeholder="When it is established">
                                </div>
                                <div class="form-group">
                                    <label>Institution Location</label><br>
                                    <select name="country" class="countries" id="countryId">
                                        <option value="132">Malaysia</option>
                                    </select>
                                    <select name="state" class="states" id="stateId">
                                        <option value="">Select State</option>
                                    </select>
                                    <select name="city" class="cities" id="cityId">
                                        <option value="">Select City</option>
                                    </select>
                                    <script src="http://iamrohit.in/lab/js/location.js"></script>
                                </div>
                                <div class="form-group">
                                    <label>Institution Type</label><br>{{ Form::select('institution_type', $i) }}
                                </div>
                                <div class="form-group">
                                    <label>Contact No</label>
                                    <input type="text" class="form-control" name="contact_no" placeholder="Official institution contact no">
                                </div>
                                <div class="form-group">
                                    <label>Fax No</label>
                                    <input type="text" class="form-control" name="fax_no" placeholder="Official institution fax no">
                                </div>
                                <div class="form-group">
                                    <label>Institution Website</label>
                                    <input type="text" class="form-control" name="website" placeholder="Official institution website">
                                </div>
                                <div class="form-group" id='TextBoxesGroupEmail'>
                                    <label>Email</label>
                                    <input type='button' value='Add' id='addEmail' class="btn btn-success size">
                                    <input type='button' value='Remove' id='removeEmail' class="btn btn-danger size">
                                    <input type="email" class="form-control" name="emails[]" placeholder="Official institution email address">
                                </div>
                                <div class="form-group" id='TextBoxesGroupPublicRelationDepartment'>
                                    <label>Public Relation Department Email</label>
                                    <input type='button' value='Add' id='addButtonPublicRelationDepartment' class="btn btn-success size">
                                    <input type='button' value='Remove' id='removeButtonPublicRelationDepartment' class="btn btn-danger size">
                                    <input type="email" class="form-control" name="public_relations_department_emails[]" placeholder="Official public relations email address">
                                </div>
                                <div class="form-group" id='TextBoxesGroupStudentEnrollMentDepartment'>
                                    <label>Student Enrollment Department Email</label>
                                    <input type='button' value='Add' id='addButtonStudentEnrollMentDepartment' class="btn btn-success size">
                                    <input type='button' value='Remove' id='removeButtonStudentEnrollMentDepartment' class="btn btn-danger size">
                                    <input type="email" class="form-control" name="student_enrollment_department_emails[]" placeholder="Official enrollment department email address">
                                </div>
                                <div id='TextBoxesGroupCorporateCommunication' class="form-group">
                                    <div id="TextBoxDivCorporateCommunication1">
                                        <label>Corporate Communication Department Email</label>
                                        <input type='button' value='Add' id='addButtonCorporateCommunication' class="btn btn-success size">
                                        <input type='button' value='Remove' id='removeButtonCorporateCommunication' class="btn btn-danger size">
                                        <input type="email" class="form-control" name="corporate_communications_department_emails[]" placeholder="Official corporate communication email address">
                                    </div>
                                </div>
                                <div class="form-group" id='TextBoxesGroupMarketingDepartment'>
                                    <label>Marketing Department Email</label>
                                    <input type='button' value='Add' id='addButtonMarketingDepartment' class="btn btn-success size">
                                    <input type='button' value='Remove' id='removeButtonMarketingDepartment' class="btn btn-danger size">
                                    <input type="email" class="form-control" name="marketing_department_emails[]" placeholder="Official marketing department email address">
                                </div>
                                <div class="form-group">
                                    <label>Campus Location</label>
                                    <input type="text" class="form-control" name="campus_location" placeholder="Full address of the campus location">
                                </div>
                                <div class="form-group">
                                    <label>Examination Board</label>
                                    <input type="text" class="form-control" name="examination_board" placeholder="Examination board">
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                </div>
                                <div class="checkbox">
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
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var EmailCounter = 2;
        $("#addEmail").click(function() {
            if (EmailCounter > 10) return alert("Only 10 textboxes allow"), !1;
            var a = $(document.createElement("div")).attr("id", "TextBoxDivEmail" + EmailCounter);
            a.after().html("<label>Email " + EmailCounter + ' : </label><input type="email" name="emails[]" id="textbox' + EmailCounter +
                '"placeholder="Official email address ' + EmailCounter + '" >'), a.appendTo("#TextBoxesGroupEmail"), EmailCounter++
        }), $("#removeEmail").click(function() {
            return 1 == EmailCounter ? (alert("No more textbox to remove"), !1) : (EmailCounter--, void $("#TextBoxDivEmail" + EmailCounter).remove())
        }), $("#getButtonValue").click(function() {
            var a = "";
            for (i = 1; i < EmailCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            alert(a)
        });
        var CorporateCommunicationCounter = 2;
        $("#addButtonCorporateCommunication").click(function() {
            if (CorporateCommunicationCounter > 10) return alert("Only 10 textboxes allow"), !1;
            var a = $(document.createElement("div")).attr("id", "TextBoxDivCorporateCommunication" + CorporateCommunicationCounter);
            a.after().html("<label>Corporate Communication Department Email " + CorporateCommunicationCounter + ' : </label><input type="email" name="corporate_communications_department_emails[]" id="textbox' +
                    CorporateCommunicationCounter + '"placeholder="Official corporate communication email address ' + CorporateCommunicationCounter + '" >'), a.appendTo("#TextBoxesGroupCorporateCommunication"),
                CorporateCommunicationCounter++
        }), $("#removeButtonCorporateCommunication").click(function() {
            return 1 == CorporateCommunicationCounter ? (alert("No more textbox to remove"), !1) : (CorporateCommunicationCounter--, void $("#TextBoxDivCorporateCommunication" + CorporateCommunicationCounter).remove())
        }), $("#getButtonValue").click(function() {
            var a = "";
            for (i = 1; i < CorporateCommunicationCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            alert(a)
        });
        var MarketingDepartmentCounter = 2;
        $("#addButtonMarketingDepartment").click(function() {
            if (MarketingDepartmentCounter > 10) return alert("Only 10 textboxes allow"), !1;
            var a = $(document.createElement("div")).attr("id", "TextBoxDivMarketingDepartment" + MarketingDepartmentCounter);
            a.after().html("<label>Marketing Department Email " + MarketingDepartmentCounter + ' : </label><input type="email" name="marketing_department_emails[]" id="textbox' + MarketingDepartmentCounter +
                '"placeholder="Official marketing department email address ' + MarketingDepartmentCounter + '" >'), a.appendTo("#TextBoxesGroupMarketingDepartment"), MarketingDepartmentCounter++
        }), $("#removeButtonMarketingDepartment").click(function() {
            return 1 == MarketingDepartmentCounter ? (alert("No more textbox to remove"), !1) : (MarketingDepartmentCounter--, void $("#TextBoxDivMarketingDepartment" + MarketingDepartmentCounter).remove())
        }), $("#getButtonValue").click(function() {
            var a = "";
            for (i = 1; i < MarketingDepartmentCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            alert(a)
        });
        var StudentEnrollMentDepartmentCounter = 2;
        $("#addButtonStudentEnrollMentDepartment").click(function() {
            if (StudentEnrollMentDepartmentCounter > 10) return alert("Only 10 textboxes allow"), !1;
            var a = $(document.createElement("div")).attr("id", "TextBoxDivStudentEnrollMentDepartment" + StudentEnrollMentDepartmentCounter);
            a.after().html("<label>Student Enrollment Department Email " + StudentEnrollMentDepartmentCounter + ' : </label><input type="email" name="student_enrollment_department_emails[]" id="textbox' +
                    StudentEnrollMentDepartmentCounter + '"placeholder="Official student enrollment email address ' + StudentEnrollMentDepartmentCounter + '" >'), a.appendTo("#TextBoxesGroupStudentEnrollMentDepartment"),
                StudentEnrollMentDepartmentCounter++
        }), $("#removeButtonStudentEnrollMentDepartment").click(function() {
            return 1 == StudentEnrollMentDepartmentCounter ? (alert("No more textbox to remove"), !1) : (StudentEnrollMentDepartmentCounter--, void $("#TextBoxDivStudentEnrollMentDepartment" + StudentEnrollMentDepartmentCounter).remove())
        }), $("#getButtonValue").click(function() {
            var a = "";
            for (i = 1; i < StudentEnrollMentDepartmentCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            alert(a)
        });
        var PublicRelationDepartmentCounter = 2;
        $("#addButtonPublicRelationDepartment").click(function() {
            if (PublicRelationDepartmentCounter > 10) return alert("Only 10 textboxes allow"), !1;
            var a = $(document.createElement("div")).attr("id", "TextBoxDivPublicRelationDepartment" + PublicRelationDepartmentCounter);
            a.after().html("<label>Public  Relation Department Email " + PublicRelationDepartmentCounter + ' : </label><input type="email" name="public_relations_department_emails[]" id="textbox' + PublicRelationDepartmentCounter +
                '"placeholder="Official public relation email address ' + PublicRelationDepartmentCounter + '" >'), a.appendTo("#TextBoxesGroupPublicRelationDepartment"), PublicRelationDepartmentCounter++
        }), $("#removeButtonPublicRelationDepartment").click(function() {
            return 1 == PublicRelationDepartmentCounter ? (alert("No more textbox to remove"), !1) : (PublicRelationDepartmentCounter--, void $("#TextBoxDivPublicRelationDepartment" + PublicRelationDepartmentCounter).remove())
        }), $("#getButtonValue").click(function() {
            var a = "";
            for (i = 1; i < PublicRelationDepartmentCounter; i++) a += "\n Textbox #" + i + " : " + $("#textbox" + i).val();
            alert(a)
        });

        $("#datepicker").datepicker();
    });
</script>
@endsection
