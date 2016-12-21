<style>
    td input {
        width: 100%;
    }
</style>


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card card-profile">
            <div class="card-header card-background card-background-sub">
                <h2 class="title"><b>Ubah Kedudukan Sekolah</b></h2>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama Sekolah</th>
                            <th>Kedudukan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($count = 1; $count <= 10 ; $count++)
                            <tr>
                                <td>
                                    {{Form::text('name[]',null,['class'=>'cariSekolah'])}}
                                </td>
                                <td>
                                    {{ $count }}
                                    {{Form::hidden('rank[]',$count)}}
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit('Hantar',['type'=>'button','class'=>'btn btn-success']) !!}
                {!! Form::button('Batal',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}
            </div>
        </div>
    </div>
</div>


<script>
    (function ($) {
        $('.cariSekolah').autocomplete({
            delay : 0,
            source: '{{ action('School\SchoolController@search') }}',
        });
    })(jQuery);
</script>