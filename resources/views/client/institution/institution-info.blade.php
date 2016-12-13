@extends('client.layout.headerLayout')

@section('title', 'Institution')
@section('headbar', 'Institution Info')
@section('content2')

    <div>

        <div class="col-lg-12">
            <div class="box box-solid">
                <div class="box-header with-border" style="margin-left:2%">
                    <i class="fa fa-book"></i>

                    <h1 class="box-title"> {{ $institution->name }} </h1>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="margin-left:2%; font-size:125%">
                    <dl class="dl-horizontal">
                        <dt>Institution Type</dt>
                        <dd> {{ $institution->type->name }} </dd>
                        <hr>
                        <dt>Abbreviation</dt>
                        <dd> {{ $institution->abbreviation }} </dd>
                        <hr>
                        <dt>Established</dt>
                        <dd> {{ $institution->established }} </dd>
                        <hr>
                        <dt>Location</dt>
                        <dd> {{ $institution->location }} </dd>
                        <hr>
                        <dt>Address</dt>
                        <dd> {{ $institution->address != null ? $institution->address : 'Address not added'}} </dd>
                        <hr>
                        <dt>Contact</dt>
                        <dd> {{ $institution->contact_no != null ? $institution->contact_no: 'Contact not added'}} </dd>
                        <hr>
                        <dt>Address</dt>
                        <dd> {{ $institution->fax_no != null ? $institution->fax_no: 'Fax not added'}} </dd>
                        <hr>
                        <dt>Website</dt>
                        <dd>
                            <a href=" http://{{ $institution->website != null ? $institution->website : 'Website not added '}} "> {{ $institution->website != null ? $institution->website : 'Website not added '}} </a>
                        </dd>
                        <hr>
                        <dt>Main branch</dt>
                        <dd> {{ $institution->parent != null ? $institution->parent->name : 'Main branch not added' }} </dd>
                        <hr>
                        <dt>Description</dt>
                        <dd>{!! $institution->description !!}</dd>
                        <hr>
                        <dt>Email</dt>
                        <dd>{!! $institution->email !!}</dd>
                        <hr>
                        <dt>Public Relations Department Email</dt>
                        <dd>{!! $institution->public_relations_department_email !!}</dd>
                        <hr>
                        <dt>Corporate Communications Department Email</dt>
                        <dd>{!! $institution->corporate_communications_department_email !!}</dd>
                        <hr>
                        <dt>Marketing Department Email</dt>
                        <dd>{!! $institution->marketing_department_email !!}</dd>
                        <hr>
                        <dt>Student Enrollment Department Email</dt>
                        <dd>{!! $institution->student_enrollment_department_email !!}</dd>
                        <hr>
                    </dl>

                </div>
                <div class="box-footer">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                        <a href="{!! route('client.institution.view') !!}" class="btn btn-warning">Cancel</a>
                        <a href="{!! route('client.institution.edit',$institution->id) !!}"
                           class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    </div>











@endsection
