@extends('client.layout.headerLayout') @section('title', 'Scholarship') @section('headbar', 'View Scholarship') @section('content2')

    <div class="row" id="view_scholarship">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-body" style="font-size:125%">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd> {{$scholarship->name}} </dd>
                        <hr>
                        <dt>Description</dt>
                        <dd> {!! $scholarship->description !!} </dd>
                        <hr>
                        <dt>Contact</dt>
                        <dd> {{$scholarship->contact}} </dd>
                        <hr>
                        <dt>Website</dt>
                        <dd> {{$scholarship->website}} </dd>
                        <hr>
                        <dt>Opening Date</dt>
                        <dd> {{$scholarship->opening}} </dd>
                        <hr>
                        <dt>Closing Date</dt>
                        <dd> {{$scholarship->closing}} </dd>
                        <hr>
                        <dt>Status</dt>
                        <dd> {{$scholarship->status == 0 ? 'Active' : 'Inactive'}} </dd>
                        <hr>
                        <dt>File</dt>
                        <dd><a href="{{$s3.$scholarship->path}}" download>{{$scholarship->filename}}</a></dd>
                        <hr>
                    </dl>
                    <button type="button" name="edit_scholarship" id="btn_edit_scholarship" class="btn btn-success">
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="box" id="edit_scholarship" style="display:none">
        <div class="box-body">
            <fieldset>
                <legend>Edit Scholarship</legend>
                <form role="form" method="post"
                      action="{{action('ScholarshipController@clientUpdate',$scholarship->id)}}" autocomplete="off"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$scholarship->name}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="8" cols="40">{{$scholarship->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="contact" value="{{$scholarship->contact}}">
                    </div>

                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" value="{{$scholarship->website}}">
                    </div>

                    <div class="form-group">
                        <label>Opening Date</label>
                        <input type="date" name="opening" value="{{$scholarship->opening}}">
                    </div>

                    <div class="form-group">
                        <label>Closing Date</label>
                        <input type="date" name="closing" value="{{$scholarship->closing}}">
                    </div>

                    <div class="form-group">
                        {{Form::select('status',['0'=>'Active','1'=>'Inactive'],$scholarship->status,['id'=>'type-id','class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        <input name="file_form" type="file">
                    </div>
                    <button class="btn btn-warning" type="submit">Update</button>
                    <button class="btn btn-info" id="cancel_edit_scholarship" type="button">Cancel</button>
                </form>
            </fieldset>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            CKEDITOR.replace('description');
            $('#btn_edit_scholarship').on('click', function () {
                $('#view_scholarship').hide();
                $('#edit_scholarship').show();
            });
            $('#cancel_edit_scholarship').on('click', function () {
                $('#view_scholarship').show();
                $('#edit_scholarship').hide();
            });
        });



    </script>
@endsection
