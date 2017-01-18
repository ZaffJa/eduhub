@extends('admin.layout.app')
@section('title', 'New Institution Request')
@section('headbar', 'All Institution')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class='table table-striped table-bordered table-hover table-condensed'>
                        <tbody>
                        <tr>
                            <td>Status</td>
                            <td class="text-center">
                                <span class="text-aqua  text-bold text-capitalize">{{ $newInstitution->status() }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Institution Logo</td>
                            <td><img src="{{ env('AWS_S3') }}{{ $newInstitution->image }}" alt=""
                                     class="img-rounded img-responsive"></td>
                        </tr>
                        <tr>
                            <td>Institution Name</td>
                            <td>{{ $newInstitution->name }}</td>
                        </tr>
                        <tr>
                            <td>Institution Description</td>
                            <td>{!! $newInstitution->description !!}</td>
                        </tr>
                        <tr>
                            <td>Established Since</td>
                            <td>{{ $newInstitution->established }}</td>
                        </tr>
                        <tr>
                            <td>Institution Location</td>
                            <td>{{ $newInstitution->location }}</td>
                        </tr>
                        <tr>
                            <td>Institution Address</td>
                            <td>{{ $newInstitution->address }}</td>
                        </tr>
                        <tr>
                            <td>Institution Website</td>
                            <td>{{  $newInstitution->website }}</td>
                        </tr>
                        <tr>
                            <td>Institution Email</td>
                            <td>{{ $newInstitution->email }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a role="button" href="{{ action('InstitutionController@newInstitutionRequest') }}"
                       class="btn btn-info" style="width: 100%;"><span class="fa fa-arrow-left"></span> Back</a>
                </div>
                <div class="col-md-4">
                    <a role="button" class="btn btn-success" style="width: 100%;"
                       onclick="return confirm('Are you sure you want to proceed with this action?')"
                       href="{{ action('InstitutionController@newInstitutionRequestAction',['newInstitution' => $newInstitution->id,'action' => 1]) }}">
                        <span class="fa fa-check"></span>
                        Approve</a>
                </div>
                <div class="col-md-4">
                    <a role="button" class="btn btn-danger" style="width: 100%;"
                       onclick="return confirm('Are you sure you want to proceed with this action?')"
                       href="{{ action('InstitutionController@newInstitutionRequestAction',['newInstitution' => $newInstitution->id,'action' => 2]) }}">
                        <span class="fa fa-times"></span>
                        Reject</a>
                </div>
            </div>
        </div>
    </div>
@endsection