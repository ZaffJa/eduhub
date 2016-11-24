@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

<style>
    #map {
        height: 400px;
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

    <h2>Edit profile</h2>

    <form method="post" action="{{ action('Student\ProfileController@update') }}" enctype="multipart/form-data">

        <div class="form-group">
            {{Form::label('name', 'Name')}} 
            {{Form::text('name',isset($user->name) ? $user->name : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('email', 'E-Mail Address')}} 
            {{Form::text('email',isset($user->email) ? $user->email : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('address', 'Address')}} 
            {{Form::text('address',isset($student->address) ? $student->address : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('school', 'Secondary School')}} 
            {{Form::text('school',isset($student->school) ? $student->school : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('phone', 'Phone No.')}} 
            {{Form::text('phone',isset($student->phone) ? $student->phone : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('birthday', 'Birthday')}} 
            {{Form::date('birthday',isset($student->birthday) ? $student->birthday : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <input type="hidden" id="latitude" name="latitude">
        </div>

        <div class="form-group">
            <input type="hidden" id="longtitude" name="longtitude">
        </div>

        <div class="input-group">
            <label class="input-group-btn">
                <span class="btn btn-primary">
                    Edit Profile Picture&hellip;
                    <input type="file" style="display: none;" name="image">
                </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>

        <a href="#" id="geolocateBtn" class="btn btn-primary">Detect your location</a>
        <div id="map"></div>

        {{csrf_field()}}

        <a ><button class="btn btn-default">Update</button></a>
        <a href="{{ action('Student\ProfileController@index') }}" class="btn btn-warning btn_view">Cancel</a>

    </form>

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

        $("#geolocateBtn").click(function() {
            geolocate();
        });

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 1.5300076438874903, lng: 103.765869140625},
            zoom: 8
            });
            
            map.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng,map);
                $("#latitude").val(e.latLng.toJSON().lat);
                $("#longtitude").val(e.latLng.toJSON().lng);
            });
        
        }

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(map);
            }
        }

        function placeMarkerAndPanTo(latLng,map) {
            var marker = new google.maps.Marker({
                position: latLng,
                title:"Your location"
            });
            setMapOnAll(null);
            marker.setMap(map);
            markers.push(marker);
            map.panTo(latLng);
        }

        function geolocate() {
            infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
              }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
              });
            } else {
              // Browser doesn't support Geolocation
              handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Error: The Geolocation service failed.' :
                                  'Error: Your browser doesn\'t support geolocation.');
        }


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgdkEKOxECZPSbpr7MvPZMLH7sBGeIbV8&callback=initMap">
    </script>
@endsection
