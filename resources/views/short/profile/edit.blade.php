
@extends('short.layout.headerApp')
@section('title', 'Profile')
@section('headbar', 'Edit Profile')
@section('content2')
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
<div class="box box-primary">
  <div class="box-header">
    <div class="col-md-2">
    <h3>Edit profile info</h3>
    </div>
  </div>
  <div class="box-body">
    <form method="post" class="confirmLeaveBeforeSave" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-2">
        <label>
            Profile picture
        </label>
      </div>
      <div class="col-md-4">
        <div class="row">
          <a class="profile-link" href="#" >
            <img class="profile-pic" id="clickImg" src="/img/{!! $profilePic->path !!}" val="{!! $profilePic->path !!}" /></a>
        </div>
        <div class="row">
          <div class="col-md-4">
          <input type="file" name="provider_pic">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <label>
            Name
        </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{!!$provider->name !!}" name="name" placeholder="Providers Name">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Headline
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{!!$provider->headline !!}" name="headline" placeholder="Providers Headline">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Abbreviation
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{{$provider->abbreviation != null ? $provider->abbreviation : ''}} " name="abbreviation" placeholder="Providers Abbreviation">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Established
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{{$provider->established != null ? $provider->established : '' }}" name="established" placeholder="Date Established">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Location
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{{$provider->location != null ? $provider->location : '' }}" name="location" placeholder="Providers Location">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Type
      </label>
      </div>
      <div class="col-md-10 col-sm-12 col-xs-12">
        {{ Form::select('type_id', $providerType) }}
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Website
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{{$provider->website != null ? $provider->website : ''}} " name="website" placeholder="Providers Website">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      <label>
          Facebook
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="{{ $provider->facebook != null ? $provider->facebook : '' }} " name="facebook" placeholder="Providers Facebook">
      </div>
    <div class="box-body">
        <form method="post" class="confirmLeaveBeforeSave">
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Profile picture
                    </label>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <a class="profile-link" href="#">
                            <img class="profile-pic" src="https://lh3.googleusercontent.com/-Y2IJzlUUV70/AAAAAAAAAAI/AAAAAAAAAAA/HMC3aK1S30o/photo.jpg" /></a>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" id="profile_pic" name="name_last" placeholder="Last Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Name
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value=" {!! $provider->name !!} " name="name" placeholder="Providers Name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Headline
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value=" {!! $provider->headline !!} " name="headline" placeholder="Providers Headline">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Abbreviation
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value="{{ $provider->abbreviation != null ? $provider->abbreviation : ''}} " name="abbreviation" placeholder="Providers Abbreviation">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Established
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value="{{ $provider->established != null ? $provider->established : '' }}" name="established" placeholder="Date Established">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Location
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value="{{ $provider->location != null ? $provider->location : '' }}" name="location" placeholder="Providers Location">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Type
                    </label>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    {{ Form::select('type_id', $providerType) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Website
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value="{{ $provider->website != null ? $provider->website : ''}} " name="website" placeholder="Providers Website">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Facebook
                    </label>
                </div>
                <div class="col-md-10">
                    <input type="text" value="{{ $provider->facebook != null ? $provider->facebook : '' }} " name="facebook" placeholder="Providers Facebook">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Instagram
                    </label>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <input type="text" value="{{ $provider->instagram != null ? $provider->instagram : '' }} " name="instagram" placeholder="Providers Instagram">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Contact
                    </label>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <input type="text" value="{{ $provider->phone !=  null ? $provider->phone : '' }} " name="phone" placeholder="Contact">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Description
                    </label>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <textarea type="text" name="description" placeholder="Description">{{ $provider->description != null ? $provider->description : ''}}</textarea>
                </div>
            </div>
            <div class="box-header">
                <div class="col-md-2">
                    <h3>Edit bank account info</h3>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <label>
                            Bank Type
                        </label>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        {{ Form::select('bank_type', $bankType) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>
                            Bank Account
                        </label>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <input type="text" value="{{ $provider->bank_account != null ? $provider->bank_account : '' }} " name="bank_account" placeholder="Providers Bank Account">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {{ csrf_field() }}
                <div class="col-md-offset-9">
                    <a href="{!! route('short.profile.view') !!}" class="btn btn-warning ">Cancel</a>
                    <a href="{!! route('short.profile.update') !!}"><button class='btn btn-success '>Update</button></a>
                </div>
            </div>
        </form>
    </div>
</div>

<a href="#_" class="lightbox" id="imgBox">
  <img class="imgSrc">
</a>

<script type="text/javascript">
  $('#clickImg').on('click',function(){
    $('.imgSrc').prop('src','/img/'+$(this).attr('val') );
    console.log($(this).attr('val'));
    console.log($('.imgSrc').attr('src'));
<!-- <a href="#_" class="lightbox" id="imgBox">
  <img class="imgSrc">
</a> -->
<script type="text/javascript">
  // $('#profile_pic').on('click',function(){
  //   $('.imgSrc').prop('src','/img/'+$('.clickImg').attr('src') );
  //   console.log($(this).attr('src'));
  // });

  $('#profile_pic').on('change',function(){
    $('.profile-pic').prop('src',$(this).val());
  });
</script>
@endsection
