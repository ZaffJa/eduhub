@extends('admin.layout.app') @section('title', 'All Institution') @section('headbar', 'All Institution') @section('content') @if ($an->isEmpty())
<p> There is no notifications from client at the moment. </p>
@else


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Institutions</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover table-striped">
            <tbody>

                <tr>
                    <th>Message</th>
                    <th>Client</th>
                    <th>Action</th>
                </tr>

                @foreach ($an as $a)

                <tr>
                    <td> {{ $a->message }} </td>
                    <td> {{ $a->user->name }} </td>
                    <td> {{ Form::select('action', ['1' => 'Pending', '2' => 'Done'], $a->action != null ? $a->action : null,['id'=>'action']) }}
                        <input type="hidden" name="id" value="{{$a->id}}"></td>
                </tr>

                @endforeach
            </tbody>

            {{ $an->render() }}

        </table>
    </div>
    <!-- /.box-body -->
</div>
@endif
<script type="text/javascript">
    $('#action').on('change', function() {
        var $action = $(this).val();
        var $id = $(this).next('input').val();

        var formData = {
            id: $id,
            action: $action
        };

        $.post("{{action('InstitutionController@postNotifications')}}", formData)
            .done(function(data) {
                console.log("Data Loaded: " + data);
            });


    });
</script>
@endsection
