@extends('client.layout.headerLayout')
@section('title', 'Course')
@section('headbar', 'Institution Form')
@section('content')

    <div class="box box-primary">
        <div class="box-body">
            <div class="col-sm-12">
                <form role="form" method="post" action="{{action('InstitutionController@postNewInstitution')}}"
                      autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Institution Image</label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" type="file" style="display:none;"
                                       onchange="$('#upload-file-info').html($(this).val());" name="file">
                                Browse Institution Logo
                            </label>
                            <h4>
                                <span class='label label-info' id="upload-file-info"></span>
                            </h4>
                        </div>
                        <div class="form-group">
                            <label>Institution Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Enter new Institution" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Institution Description</label>
                            <textarea name="description" id="description">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Established date</label>
                            <input type="text" class="form-control" name="established" id="datepicker"
                                   placeholder="When it is established" value="{{old('established')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution Location</label><br>
                            <input type="text" name="location" value="{{old('location')}}"
                                   placeholder="Example: Skudai/Johor">
                        </div>
                        <div class="form-group">
                            <label>Campus Location</label>
                            <input type="text" class="form-control" name="address"
                                   placeholder="Full address of the campus location"
                                   value="{{old('address')}}">
                        </div>
                        <div class="form-group">
                            <label>Institution Website</label>
                            <input type="text" class="form-control" name="website"
                                   placeholder="Official institution website" value="{{old('website')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label> <span class="label label-info"> Add comma for each new email</span>
                            <input type="text" id="email" name="email" value="{{ old('email') }} "
                                   class="form-control">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
@endsection
@section('header-css')

@endsection

@section('header-scripts')

    <script type="text/javascript">
        $(function () {
            $(document).on('click', '#close-preview', function () {
                $('.image-preview').popover('hide');
                // Hover befor close the preview
            });
            CKEDITOR.replace('description');
            $("#datepicker").datepicker();
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");

            // Clear event
            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
