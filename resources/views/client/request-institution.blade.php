@extends('client.layout.headerLayout')
@section('title', 'Request Institution')
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    @if(count($registerInstitutions) > 0)
                        <table class='table table-striped table-bordered table-hover table-condensed'>
                            <thead>
                            <tr>
                                <th>Institution Name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registerInstitutions as $registerInstitution)
                                <tr>
                                    <td>{{$registerInstitution->institution->name}}</td>
                                    <td style="color:{{$registerInstitution->status == 1 ? 'orange' : 'red'}}">{{$registerInstitution->status == 1 ? 'Pending' : 'Rejected'}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <form role=form method=post action="{{route('client.request.add.institution')}}" autocomplete="off">
                        <div class=box-body>
                            {{Form::select('institution_id',$institutions,null,['placeholder' => 'Select an institution',
                                                                     'class'=>'form-control',
                                                                     'style'=>'padding:0px !important'])}}
                            <button type='submit' class='btn btn-md btn-default'>Submit</button>
                            {{csrf_field()}}
                        </div>
                    </form>
                </div>
                @if(empty($newInstitution))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-offset-9">
                                <a href="{{ action('InstitutionController@getNewInstitution') }}"
                                   class="btn btn-info-outline">Request new institution</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(!empty($newInstitution))
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
            </div>
        </div>
    @endif


@endsection
