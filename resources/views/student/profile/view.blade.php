@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
<style>
    #map {
        height: 600px;
        width: 100%;
    }
</style>

<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <div class="card">
          <div class="card-header" data-background-color="green" >
            <h4 class="title" >Profile Info</h4></div>

            <div class="card-content">
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    <br>
                    {{isset($user->name) ? $user->name : null}}
                </div>

                <div class="form-group">
                    {{Form::label('email', 'E-Mail Address')}}
                    <br>
                    {{isset($user->email) ? $user->email : null}}
                </div>

                <div class="form-group">
                    {{Form::label('address', 'Address')}}
                    <br>
                    {{isset($student->address) ? $student->address : null}}
                </div>

                <div class="form-group">
                    {{Form::label('school', 'Secondary School')}}
                    <br>
                    {{isset($student->school) ? $student->school : null}}
                </div>

                <div class="form-group">
                    {{Form::label('phone', 'Phone No.')}}
                    <br>
                    {{isset($student->phone) ? $student->phone : null}}
                </div>

                <div class="form-group">
                    {{Form::label('birthday', 'Birthday')}}
                    <br>
                    {{isset($student->birthday) ? $student->birthday : null}}
                </div>
            </div>
        </div>



        <div id="map"></div>


        <a href="{{ action('Student\ProfileController@edit') }}"><button class="btn btn-info">Edit</button></a>

</div>
<script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

        var map;
        var infoWindow;
        var pos;
        var markers = [];


        function initMap() {
            var location = new google.maps.LatLng(
            parseFloat("{{isset($location->latitude) ? $location->latitude : 1.5300076438874903}}").toFixed(6),
            parseFloat("{{isset($location->longtitude) ? $location->longtitude : 103.765869140625}}").toFixed(6)
            );

            map = new google.maps.Map(document.getElementById('map'), {
            center: location,
            zoom: 13,

            });

            infoWindow = new google.maps.InfoWindow({map: map});
            infoWindow.setPosition(location);
            infoWindow.setContent('Your location.');
        }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChsUkNrNkS74PBi73WuMHZyAjQhQWt-sg&callback=initMap">
    </script>
@endsection
