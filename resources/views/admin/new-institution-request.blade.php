@extends('admin.layout.app')
@section('title', 'New Institution Request')
@section('headbar', 'All Institution')

@section('content')
    <table class='table table-striped table-hover table-condensed'>
        <thead>
        <tr>
            <th>User Name</th>
            <th>Institution Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($newInstitutions as $newInstitution)
            <tr>
                <td>{{$newInstitution->user->name ?? null}}</td>
                <td>{{$newInstitution->name }}</td>
                <td>
                    <a role="button" class="btn btn-info"
                       href="{{ action('InstitutionController@viewNewInstitutionRequest',$newInstitution->id) }}">
                        <span class="fa fa-eye"></span> View</a>
                    <a role="button" class="btn btn-success"><span class="fa fa-check"></span> Approve</a>
                    <a role="button" class="btn btn-danger"><span class="fa fa-times"></span> Reject</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection