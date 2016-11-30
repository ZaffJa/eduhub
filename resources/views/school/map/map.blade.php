@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
<style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>

<div id="map"></div>

 <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.

        var map;
        var infoWindow;
        var pos;
        var newMarker = [];
        var pastMarker = [];

        function initMap() {
            var pastLocation = new google.maps.LatLng(
                    parseFloat("{{isset($location->latitude) ? $location->latitude : 1.5300076438874903}}").toFixed(6),
                    parseFloat("{{isset($location->longtitude) ? $location->longtitude : 103.765869140625}}").toFixed(6)
            );

            map = new google.maps.Map(document.getElementById('map'), {
                center: pastLocation,
                zoom: 11,

            });

            var pastLocation =  new google.maps.Marker({
                position : pastLocation,
                map: map,
                title: 'Your past location'
            });

            var pastInfo = new google.maps.InfoWindow({
                content: 'Sekolah Menengah Example'
            });

            pastLocation.addListener('click', function() {
                pastInfo.open(map, pastLocation);
            });

           

            map.addListener('click', function (e) {
                placeMarkerAndPanTo(e.latLng, map);
            });

        }

        function setMapOnAll(map) {
            for (var i = 0; i < newMarker.length; i++) {
                newMarker[i].setMap(map);
            }
        }

        function placeMarkerAndPanTo(latLng, map) {
            var marker = new google.maps.Marker({
                position: latLng,
                title: "Your location"
            });
            
            var infoWindow = new google.maps.InfoWindow({
                content: 'New Location'
            });

            setMapOnAll(null);
            
            marker.setMap(map);
            
            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
            
            newMarker.push(marker);
            
            map.panTo(latLng);
        }

        function geolocate() {
            infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    map.setCenter(pos);
                    $("#latitude").val(position.coords.latitude);
                    $("#longtitude").val(position.coords.longtitude);
                }, function () {
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