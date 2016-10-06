@extends('short.layout.headerApp')
@section('title', 'Profile')
@section('headbar', 'Edit Profile')
@section('content2')
<div class="box box-primary">
  <div class="box-header">
    <div class="col-md-2">
    <h3>Edit profile info</h3>
    </div>
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
          <a class="profile-link" href="#" >
            <img class="profile-pic" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/91525/AmeliaBR.jpg"/></a>
        </div>
        <div class="row">
          <div class="col-md-4">
          <input type="file" value="" name="name_last" placeholder="Last Name">
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
@endsection
