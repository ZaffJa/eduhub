@extends('client.layout.headerLayout') @section('title', 'Client Request Institution') @section('headbar', 'List of client request') @section('content2') @if ($ri->isEmpty())
<p> There is no request from client at the moment. </p>
@else

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Client Email</th>
                            <th>Client Name</th>
                            <th>Institution</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ri as $r)
                        <tr>
                            <td>{!! $r->user->email !!}</td>
                            <td>{!! $r->user->name !!}</td>
                            <td>{!! $r->institution->name !!}</td>
                            <td>
                                <a class='btn btn-md btn-primary' href="{{route('admin.approve.institution.request',$r->id)}}">Approve</a>
                                <a class='btn btn-md btn-danger' href="{{route('admin.reject.institution.request',$r->id)}}">Reject</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif @endsection
