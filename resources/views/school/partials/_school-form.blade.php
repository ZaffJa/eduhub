

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card card-profile">
            <div class="card-header card-background card-background-sub">
                <h2 class="title"><b>Daftar Sekolah Baru</b></h2>
            </div>
            <div class="card-content">
                <div class="form-group">
                    {{Form::label('name', 'Name')}} {{Form::text('name',null,['class'=>'form-control','required'])}}
                </div>

                {{--<div class="form-group">--}}
                {{--{{Form::label('type', 'Type')}} {{ Form::select('type',$type, null,['class'=>'form-control','required','placeholder'=>'Please select a type']) }}--}}
                {{--</div>--}}
                <input type="hidden" name="type" value="menengah">

                <div class="form-group">
                    {{Form::label('rank', 'Kedudukan Sekolah')}} {{ Form::text('rank',null,['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('stream_type_id', 'Aliran Sekolah')}} {{ Form::select('stream_type_id',$school_stream,null,['class'=>'form-control','required','placeholder'=>'Sila pilih aliran sekolah']) }}
                </div>

                <div class="form-group">
                    {{Form::label('school_type', 'Jenis Sekolah')}} {{ Form::select('school_type_id',$school_type,null,['class'=>'form-control','required','placeholder'=>'Sila pilih jenis sekolah']) }}
                </div>

                <div class="form-group">
                    {{Form::label('ppd', 'Pejabat Pendidikan Daerah')}} {{Form::text('ppd',null,['class'=>'form-control','required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('code', 'Kod Sekolah')}} {{Form::text('code',null,['class'=>'form-control','required'])}}
                </div>

                {{--<div class="form-group">--}}
                    {{--{{Form::label('mission', 'Mission')}} {{Form::text('mission',null,['class'=>'form-control','required'])}}--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--{{Form::label('vision', 'Vision')}} {{Form::text('vision',null,['class'=>'form-control','required'])}}--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--{{Form::label('objective', 'Objective')}} {{Form::text('objective',null,['class'=>'form-control','required'])}}--}}
                {{--</div>--}}

                <div class="form-group">
                    {{  Form::label('address', 'Alamat')}} {{Form::text('address',null,['class'=>'form-control','required']) }}
                </div>

                <div class="form-group">
                    {{Form::label('postcode', 'Poskod')}} {{Form::text('postcode',null,['class'=>'form-control','required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('city', 'Bandar')}} {{Form::text('city',null,['class'=>'form-control','required'])}}
                </div>

                <div class="form-group">
                    {{ Form::select('state',$states,null,[ 'placeholder'=>'Sila pilih negeri', 'required', 'class'=>'form-control' ]) }}
                </div>

                <div class="form-group">
                    {{Form::label('telephone', 'Telefon')}} {{Form::text('telephone',null,['class'=>'form-control','required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('fax', 'Faks')}} {{Form::text('fax',null,['class'=>'form-control','required'])}}
                </div>

                <div class="form-group">
                    {{Form::label('facebook', 'Facebook')}} {{Form::text('facebook',null,['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('instagram', 'Instagram')}} {{Form::text('instagram',null,['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('twitter', 'Twitter')}} {{Form::text('twitter',null,['class'=>'form-control'])}}
                </div>

                @include('school.partials._map')
            </div>
            <div class="card-footer">

                {!! Form::submit('Hantar',['type'=>'button','class'=>'btn btn-success']) !!} {!! Form::button('Batal',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {

// We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

// We can watch for our custom `fileselect` event like this
        $(document).ready(function () {
            $(':file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });
        });

    });
</script>
