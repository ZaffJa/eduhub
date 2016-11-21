@extends('client.layout.headerLayout') @section('title', 'Profile') @section('headbar', 'Institution Profile Edit') @section('content2')
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
        <!-- /.box-header -->
        <div class="box-body" style="margin-left:2%; font-size:125%">
            <dl class="dl-horizontal">
                <dt>Enquirer Name </dt>
                <dd> {{$enquiry->name}} </dd>
                <hr>
                <dt>Enquirer Email </dt>
                <dd> {{$enquiry->email}} </dd>
                <hr>
                <dt>Course Enquiry </dt>
                <dd> {{$enquiry->course_name}} </dd>
                <hr>
            </dl>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@endsection
