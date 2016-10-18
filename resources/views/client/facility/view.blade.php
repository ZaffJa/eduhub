@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Facility')
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
<div class="box">
  @if ($facilities->isEmpty())
  <div class="box-header">
    <p> There are no facilities. </p>
  </div>
  @else
  <div class="box-body">
    <table style="width:100%">
      <thead>
        <tr>
        <th>Name</th>
        <th>Details</th>
        <th>Image</th>
        <th>Action</th>
        <tr>
      </thead>
      <tbody>
        @foreach($facilities as $facility)
        <tr>
          <td> {{$facility->name}} </td>
          <td> {{$facility->capacity}} </td>
          @if($facility_img->isEmpty())
          <td> Image not found </td>
          @else
            @foreach($facility_img as $faci_img)
              @if( $faci_img->facility_id == $facility->id)
                <td>
                  <a href="#imgBox" class="clickImg">{{$faci_img->filename}}</a>
                </td>
              @endif
            @endforeach
          @endif
          <td><a href="{!! action('FacilityController@edit',array($typeid, $facility->id)) !!}"><button class="btn btn-info">Edit</button></a>
          <button value="{!! route('faci.delete', [$typeid, $facility->id]) !!}" class="btn btn-danger confirmDeleteBtn">Delete</button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif

<a href="{!! route('faci.add',$typeid ) !!}" class="float">
  <i class="fa fa-plus my-float"></i>
</a>

<div class="label-container">
  <div class="label-text">Add Facility</div>
  <i class="fa fa-arrow- label-arrow"></i>
</div>

<a href="#" class="lightbox" id="imgBox">
  <img class="imgSrc">
</a>

<script type="text/javascript">
    $('.clickImg').on('click', function() {
        var $src = '{{env('AWS_S3')}}facility/'+$(this).text();
        console.log($src);
        $('.imgSrc').prop('src',$src);
        $('.lightbox').show();
    });

    $('.imgSrc').on('click',function(){
        $('#imgBox').hide();
    });
</script>

@endsection
