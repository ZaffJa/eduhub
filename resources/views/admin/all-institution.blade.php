@extends('admin.layout.app') @section('title', 'All Institution')

@section('headbar', 'All Institution') @section('content')
@if ($i->isEmpty())
<p> There is no request from client at the moment. </p>
@else

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:40%">Institution Name</th>
                            <th>Client Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($i as $r)
                        <tr>
                            <td>{!! $r->name !!}</td>
                            <td>{!! $r->client != null ? $r->client->name : '' !!}</td>
                            <td>
                                <a class='btn btn-sm btn-primary' href="{{route('admin.edit.institution',$r->id)}}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$i->render()}}
            </div>
        </div>
    </div>
</div>
@endif @endsection
