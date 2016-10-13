@extends('short.layout.headerApp') @section('title', 'Short Course') @section('headbar', 'Add Course') @section('content2')
<style type="text/css">
    .required {
        color: red;
    }

    .thumbnail {
        max-width: 40%;
    }

    .italic {
        font-style: italic;
    }

    .small {
        font-size: 0.8em;
    }

    .lightbox {
        /** Default lightbox to hidden */
        display: none;
        /** Position and style */
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100%;
        text-align: center;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
    }

    .lightbox img {
        /** Pad the lightbox image */
        max-width: 90%;
        max-height: 80%;
        margin-top: 10%;
    }

    .lightbox:target {
        /** Remove default browser outline */
        outline: none;
        /** Unhide lightbox **/
        display: block;
    }

    .required {
        color: red;
    }
</style>

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <form method="post" class="confirmLeaveBeforeSave" enctype="multipart/form-data" action="{!! route('short.course.store') !!}" autocomplete="off">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="col-md-4">
                        <h3>Add Short Course</h3>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Course Name<span class="required">*</span></label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name_en" placeholder="English Name" value="{{old('name_en') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                            <input type="text" name="name_ms" placeholder="Malay Name" value="{{ old('name_ms') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Description
                            </label>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <textarea type="text" name="description" placeholder="Eg :- This course provides basic yoga movements">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Period MIN
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="period_value_min" placeholder="Period MIN">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Period MAX
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="period_value_max" placeholder="Period MAX">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Period Type
                            </label>
                        </div>
                        <div class="col-md-3">
                            </br>
                            {{ Form::select('period_type_id', $periodType) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Course Level
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            </br>
                            {{ Form::select('level_id', $levelType) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Course Field
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            </br>
                            {{ Form::select('field_id', $fieldType + array(0 =>'Others'),null,["class='test'"]) }}
                        </div>
                    </div>
                    <div class="row" id="others">
                        <div class="col-md-10 col-md-offset-2 col-sm-12 col-xs-12">
                            <input type="text" name="others" placeholder="Other type of field">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Course Code
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="code" placeholder="Course code" value="{{ old('code') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Start Date
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="start_date" placeholder="Start Date" value="{{ old('start_date') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Course Length
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="length" placeholder="Course Length" value="{{ old('length') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Attendance
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="attendance" placeholder="Attendance" value="{{ old('attendance') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Class Size
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="class_size" placeholder="Class Size" value="{{ old('class_size') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                            <br>
                                Fee
                            </label><span class="required">*</span>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input name="price" type="number" placeholder="Fee" value="{{ old('price') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Exam fee
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="number" name="exam_fee" placeholder="Exam Fee" value="{{ old('exam_fee') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Additional Note
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="note" placeholder="Note" value="{{ old('note') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                Language
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="text" name="language" placeholder="Language" value="{{ old('language') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                                <br>
                                HRDF Scheme
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input type="number" name="hrdf_scheme" placeholder="HRDF Scheme" value="{{ old('hrdf_scheme') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                            <br>
                                Location
                            </label><span class="required">*</span>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <input name="location" type="text" placeholder="Location" value="{{ old('location') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                            <br>
                              Learning Outcome
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <br>
                            <textarea type="text" name="learning_outcome" placeholder="Learning outcome">{{old('learning_outcome')}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>
                            <br>
                              Inclusive of
                            </label>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <br>
                            <textarea type="text" name="inclusive" placeholder="Eg: breakfast and dinner, accomodation">{{ old('inclusive') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <a class="profile-link" href="#">
                                    <img class="profile-pic" id="clickImg" src='/img/avatar/picture.png' />
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="profile-link" href="#">
                                    <img class="profile-pic" id="clickImg" src='/img/avatar/picture.png' />
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="profile-link" href="#">
                                    <img class="profile-pic" id="clickImg" src='/img/avatar/picture.png' />
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <input type="file" id="profile_pic" name="short_pic1">
                            </div>
                            <div class="col-md-3">
                                <input type="file" id="profile_pic" name="short_pic2">
                            </div>
                            <div class="col-md-3">
                                <input type="file" id="profile_pic" name="short_pic3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <a class="profile-link" href="#">
                                    <img class="profile-pic" id="clickImg" src='/img/avatar/picture.png' />
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="profile-link" href="#">
                                    <img class="profile-pic" id="clickImg" src='/img/avatar/picture.png' />
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <input type="file" id="profile_pic" name="short_pic4">
                            </div>
                            <div class="col-md-3">
                                <input type="file" id="profile_pic" name="short_pic5">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                            {{csrf_field()}} The fields with a red asterix (<span class="required">*</span>) are required to be fill.
                        </div>
                        <div class="row">
                            <div class="col-md-offset-9">
                                <a href=" {!! route('short.course.view') !!} " class="btn btn-warning ">Cancel</a>
                                <button class='btn btn-success' type="submit">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<a href="#_" class="lightbox" id="imgBox">
    <img class="imgSrc" src="#">
</a>

<script type="text/javascript">
    $('.profile-pic').on('click', function() {
        var $src = $(this).prop('src');

        $('.imgSrc').prop('src', $src);
        $('.lightbox').show();
    });

    $('.imgSrc').on('click', function() {
        $('#imgBox').hide();
    });
</script>

<script>
    $("#others").hide();

    $(document).ready(function() {

        $('.test').on('change', function() {
            console.log($(this).val());
            if ($(this).val() == "0") {
                $("#others").show();

            } else {
                $("#others").hide();

            }
        });

    });
</script>
@endsection
