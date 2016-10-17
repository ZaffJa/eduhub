@extends('short.layout.headerApp')


@section('title', 'Short Course')
@section('headbar', 'Add Course')
@section('content2')
<style type="text/css">
    .thumbnail {
        max-width: 15vw;
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
</style>
    <div class="col-lg-12">
        <div class="box box-solid">
            <div class="box-header with-border" style="margin-left:2%">
                <i class="fa fa-book"></i>
                <h1 class="box-title"> Course name</h1>
            </br>
                <h3 class="box-title"> {{ $course->name_en != null ? $course->name_en : '' }} </h2>
             </br>
                <h3 class="box-title"> {{ $course->name_ms != null ? $course->name_en : '' }} </h2>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="margin-left:2%; font-size:125%">
                <dl class="dl-horizontal">
                    <div class="box-header">
                        Course Description
                    </div>
                    <dd>{{ isset($course->description) ? $course->description : "No description added" }}  </dd>
                    <hr>
                    
                    <div class="box-header">
                        Course Length, Date, Attendance & Size
                    </div>
                    <dt>Course Period (min - max)</dt>
                    <dd>{{ $course->period_value_min }} - {{ $course->period_value_max }} {{ $course->periodType != null ? $course->periodType->name : 'No course period' }}</dd>
                    <hr>
                    <dt>Course Length Per Session</dt>
                    <dd>{{ $course->length != null ? $course->length : "No course length"}}  </dd>
                    <hr>
                    <dt>Course Start Date</dt>
                    <dd>{{ $course->start_date != null ? $course->start_date : "No course start date" }} </dd>
                    <hr>
                    <dt>Course Attendance</dt>
                    <dd>{{ $course->attendance != null ? $course->attendance : "No course attendance"}}  </dd>
                    <hr>
                    <dt>Course Class Size</dt>
                    <dd>{{ $course->class_size != null ? $course->class_size : "No course class size"}}  </dd>
                    <hr>

                    <div class="box-header">
                        Course Location & Information
                    </div>
                    <dt>Course Location</dt>
                    <dd>{{ $course->location != null ? $course->location : "No course location"}}  </dd>
                    <hr>
                    <dt>Course Level </dt>
                    <dd> {{ $course->level != null ? $course->level->name : 'No course level' }} </dd>
                    <hr>
                    <dt>Course Field</dt>
                    <dd> {{ $course->field != null ? $course->field->name : 'No course field'}} </dd>
                    <hr>
                    <dt>Course Code</dt>
                    <dd>{{ $course->code != null ? $course->code : 'No course code'}}</dd>
                    <hr>
                    <dt>Course CPD/CDC Credit Hours</dt>
                    <dd>{{ $course->credit_hours != null ? $course->credit_hours : "No CPD/CDC credit hours"}}</dd>
                    <hr>
                    <dt>Course HRDF Scheme</dt>
                    <dd>{{ $course->hrdf_scheme != null ? $course->hrdf_scheme : "No HRDF scheme"}}</dd>
                    <hr>

                    <div class="box-header">
                        Course Fees & Early Bird
                    </div>
                    <dt>Course Fee</dt>
                    <dd>{{ $course->price != null ? $course->price : "No course price"}}  </dd>
                    <hr>
                    <dt>Course Exam Fee</dt>
                    <dd>{{ $course->exam_fee != null ? $course->exam_fee : "No exam fee"}}</dd>
                    <hr>
                    <dt>Early Birds Promotion</dt>
                    <dd>{{ $course->early_birds != null ? $course->early_birds : "No early birds promotion"}}</dd>
                    <hr>

                    
                    <div class="box-header">
                        Course Additional Information
                    </div>
                    <dt>Course Language</dt>
                    <dd>{{ $course->language != null ? $course->language : "No course language"}}  </dd>
                    <hr>
                    <dt>Who Should Attend</dt>
                    <dd>{{ $course->who_should_att != null ? $course->who_should_att : "No target groups"}}  </dd>
                    <hr>
                    <dt>Course Learning Outcome</dt>
                    <dd>{{ $course->learning_outcome != null ? $course->learning_outcome : "No learning outcome"}}  </dd>
                    <hr>
                    <dt>Course Inclusive of</dt>
                    <dd>{{ $course->inlcusive != null ? $course->inclusive : "No inclusion items"}}  </dd>
                    <hr>
                    <dt>Course Additional Notes</dt>
                    <dd>{{ isset($course->note) ? $course->note : "No additional note" }}  </dd>
                    <hr>

                    <div class="box-header">
                        Course Pictures (5 max)
                    </div>
                	
                	
                	
                	
                	
                    <dt>Short Course Picture</dt>
                    <dd>@if($picture)
                        @foreach($picture as $pic)
                        <div class="col-md-3">
                            <a class="profile-link" href="#">
                                <img src="/img/shortCourse/{{isset($pic) ? $pic->filename : ''}}" class="thumbnail" onerror="this.onerror=null;this.src='/img/avatar/picture.png'" >
                            </a>
                        </div>
                        @endforeach @else
                        No picture added
                        @endif
                    </dd>
                    <hr>
                </dl>
            </div>
            <div class="box-footer">
                <div class="col-md-offset-10">
                	<a href="{!! route('short.course.view') !!}" class="btn btn-warning">Cancel</a>
                	<a href="{!! route('short.course.edit', $course->id) !!}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
         <!-- /.box-body -->
	</div>

<a href="#_" class="lightbox" id="imgBox">
    <img class="imgSrc" src="#">
</a>

<script type="text/javascript">
    $('.thumbnail').on('click', function() {
        var $src = $(this).prop('src');

        $('.imgSrc').prop('src',$src);
        $('.lightbox').show();
    });

    $('.imgSrc').on('click',function(){
        $('#imgBox').hide();
    });
</script>
@endsection