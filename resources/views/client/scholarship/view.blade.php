@extends('client.layout.headerLayout') @section('title', 'Institution Scholarship') @section('headbar', 'Institution Scholarship') @section('content2')
<style media="screen">
    .thumbnail {
        max-width: 40%;
    }

    .italic {
        font-style: italic;
    }

    .small {
        font-size: 0.8em;
    }
    /** LIGHTBOX MARKUP **/

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
    <div class="box">
        @if ($scholarship == null)
        <div class="box-header">
            <p> There are no scholarship for this institution. </p>
        </div>
        @else
        <div class="box-body">
          <div class="box-body table-responsive no-padding">
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>Scholarship Name</th>
                        <th>File Name</th>
                        <th>Website</th>
                        <th>Posted On</th>
                        <th>Action</th>
                        <tr>
                </thead>
                <tbody>
                    @foreach($scholarship as $is)
                    <tr>
                        <td><a href="#img1" class="clickImg" val="{{$is->filename}}">{{$is->name}}</a></td>
                        @if(Storage::disk('s3')->exists($is->filename))
                            <td><a href="https://s3-ap-southeast-1.amazonaws.com/amr-eduhub-upoads/{{$is->filename}}">{{$is->filename}}</a></td>
                        @else
                            <td><a href="#">{{$is->filename}}</a></td>
                        @endif
                        <td><a href="{{$is->website}}" target='_blank'>{{$is->website}}</a></td>
                        <td>{{$is->updated_at->diffForHumans()}}</td>
                        <td>
                            <button value="{{route('client.delete.scholarship',$is->id)}}" class='btn btn-danger confirmDeleteBtn'>Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
        @endif
        <i>Click on the file name column to download the associated file</i>
    </div>
    <a href="{!! route('client.view.add.scholarship') !!}" class="float">
      <i class="fa fa-plus my-float"></i>
    </a>
    <div class="label-container">
      <div class="label-text">Add Scholarship</div>
      <i class="fa fa-arrow- label-arrow"></i>
    </div>
</div>

<!-- lightbox container hidden with CSS -->
<a href="#_" class="lightbox" id="img1">
  <img class="imgSrc">
</a>

<script type="text/javascript">
  $('.clickImg').on('click',function(){
    console.log($(this).attr('val'));
    $('.imgSrc').prop('src','/uploads/scholarship/'+$(this).attr('val'));
    console.log($(this).text());
  });
</script>
@endsection
