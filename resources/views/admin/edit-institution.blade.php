@extends('admin.layout.app')
@section('title', 'Course')
@section('headbar', 'Institution Form')
@section('content')<div class="col-lg-10">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Institution Name</label>
                                    <input type="text" class="form-control" name="institution_name" value="{{$i->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Institution Abbreviation</label>
                                    <input type="text" class="form-control" name="institution_abbreviation" value="{{$i->abbreviation}}">
                                </div>
                                <div class="form-group">
                                    <label>Institution Description</label>
                                    <textarea class='form-control' rows="10" style="padding:10px;">{{$i->description}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label>Established date</label>
                                    <input type="text" class="form-control" name="institution_established_date" value="{{$i->established}}" id="datepicker">
                                </div>
                                <div class="form-group">
                                    <label>Institution Location</label><br>
                                    <input type="text" name="location" value="{{$i->location}}">
                                </div>
                                <div class="form-group">
                                  <label>Institution Type</label>
                                  <input type="text" class="form-control" name="institution_type" value="{{isset($i->type) ? $i->type->name : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Contact No</label>
                                    <input type="text" class="form-control" name="contact_no">
                                </div>
                                <div class="form-group">
                                    <label>Fax No</label>
                                    <input type="text" class="form-control" name="fax_no">
                                </div>
                                <div class="form-group">
                                    <label>Institution Website</label>
                                    <input type="text" class="form-control" name="website" value="{{$i->website}}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    @foreach($i->list($i->contacts->contact->email) as $val)
                                        @if(!empty($val))
                                            <input type="email" class="form-control" name="emails[]" value="{{$val}}">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Public Relation Department Email</label>
                                    @foreach($i->list($i->contacts->contact->public_relations_department_emails) as $val)
                                        @if(!empty($val))
                                            <input type="email" class="form-control" name="public_relations_department_emails[]">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Student Enrollment Department Email</label>
                                    @foreach($i->list($i->contacts->contact->student_enrollment_department_emails) as $val)
                                        @if(!empty($val))
                                            <input type="email" class="form-control" name="student_enrollment_department_emails[]">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label>Corporate Communication Department Email</label>
                                        @foreach($i->list($i->contacts->contact->corporate_communications_department_emails) as $val)
                                            @if(!empty($val))
                                                <input type="email" class="form-control" name="corporate_communications_department_emails[]">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Marketing Department Email</label>
                                    @foreach($i->list($i->contacts->contact->marketing_department_emails) as $val)
                                        @if(!empty($val))
                                            <input type="email" class="form-control" name="marketing_department_emails[]">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Examination Board</label>
                                    @foreach($i->list($i->contacts->contact->email) as $val)
                                        @if(!empty($val))
                                            <input type="text" class="form-control" name="examination_board" value="{{$i->established}}">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Remarks</label>
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                </div>
                                <div class="checkbox">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <!-- <div class="box-footer">
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

    });
</script>
@endsection
