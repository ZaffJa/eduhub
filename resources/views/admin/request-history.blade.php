@extends('admin.layout.app') @section('title', 'Request History')

@section('headbar', 'Histories') @section('content')
@if ($i->isEmpty())
<p> There is history. </p>
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
                            <td>{!! $r->institution != null ? $r->institution->name : ''  !!}</td>
                            <td>{!! $r->user != null ? $r->user->name : '' !!}</td>
                            @if($r->status == 1)
                                <td><span style="color:yellow">Pending</span></td>
                            @elseif($r->status == 2)
                                <td><span style="color:red">Rejected</span></td>
                            @else
                                <td><span style="color:green">Accept</span></td>
                            @endif
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
