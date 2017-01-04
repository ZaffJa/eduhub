@extends('client.layout.headerLayout') @section('title', 'Request Institution') @section('headbar', 'Request Institution') @section('content2')

    <div class="box box-primary">
        <div class="box-body">
            <table class='table table-striped table-bordered table-hover table-condensed'>
                @if($all_ri != null)
                    <thead>
                    <tr>
                        <th>Institution Name</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_ri as $ri)
                        <tr>
                            <td>{{$ri->institution->name}}</td>
                            <td style="color:{{$ri->status == 1 ? 'orange' : 'red'}}">{{$ri->status == 1 ? 'Pending' : 'Rejected'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            @endif
            <form role=form method=post action="{{route('client.request.add.institution')}}" autocomplete="off">
                <div class=box-body>
                    {{Form::select('institution_id',$i,null,['placeholder' => 'Select an institution',
                                                             'class'=>'form-control',
                                                             'style'=>'padding:0px !important'])}}
                    <button type='submit' class='btn btn-md btn-default'>Submit</button>
                    {{csrf_field()}}
                </div>
            </form>
        </div>
    </div>
@endsection
