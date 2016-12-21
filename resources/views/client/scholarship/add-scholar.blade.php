@extends('client.layout.headerLayout')
@section('title', 'Scholarship')
@section('headbar', 'Add Scholarship')
@section('content2')
    <div class=col-lg-12>
        <div class="box box-primary">
            <form role=form method=post action="{{route('client.add.scholarship')}}" autocomplete="off"
                  enctype="multipart/form-data">
                <div class=box-body>
                    <div class=form-group>
                        <label>Scholarship Title</label>
                        <input type="text" name="scholarship_name" value="{{ old('scholarship_name') }}">
                    </div>
                    <div class=form-group>
                        <label>Description</label>
                        <textarea name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class=form-group>
                        <label>Address</label>
                        <input type="text" name="scholarship_address" value="{{ old('scholarship_address') }}">
                    </div>
                    <div class=form-group>
                        <label>Select</label>
                        {{Form::select('type_id',$filetypes,null,['id'=>'type-id','class'=>'form-control'])}}
                    </div>
                    <div class=form-group>
                        <label>Contact</label>
                        <input name="scholarship_contact" type="number" maxlength="13" value="{{ old('scholarship_contact') }}">
                    </div>
                    <div class=form-group>
                        <label>Website</label>
                        <input name="website" type="text" value="{{ old('website') }}">
                    </div>
                    <div class=form-group>
                        <label>Opening Date</label>
                        <input name="opening" type="date" value="{{ old('opening') }}">
                    </div>
                    <div class=form-group>
                        <label>Closing Date</label>
                        <input name="closing" type="date" value="{{ old('closing') }}">
                    </div>
                    <div class=form-group>
                        <label>Upload File</label>
                        <label class="btn btn-primary" for="my-file-selector">
                            <input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());" name="file_form">
                            Browse Scholarship File
                        </label>
                        <h4><div class='label label-info' id="upload-file-info"></div></h4>
                        <p>File &nbsp;only accept - <span id="only-accept">jpeg,png,jpg,gif,svg</span></p>
                    </div>
                    <input type="hidden" name="file_type" id="file-type" value="jpeg,png,jpg,gif,svg">
                    {{csrf_field()}}
                </div>
                <div class=box-footer>
                    <div class="col-lg-10">
                    </div>
                    <div class="col-lg-2">
                        <a class="btn btn-warning" href="{{action('ScholarshipController@view')}}">Cancel</a>
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            CKEDITOR.replace('description');

            $('#type-id').on('change', function () {
                $val = $(this).val();
                $only = $('#only-accept');

                if ($val == 1) {
                    $only.html('jpeg,png,jpg,gif,svg');
                    $('#file-type').val('jpeg,png,jpg,gif,svg');
                } else if ($val == 3) {
                    $only.html('doc,docx,pdf');
                    $('#file-type').val('doc,docx,pdf');
                }
            });
        });


    </script>
@endsection
