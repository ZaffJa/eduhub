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
                title: 'Your past location',
                icon : '/img/logo/map eduhub-02.png'
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

    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgdkEKOxECZPSbpr7MvPZMLH7sBGeIbV8&callback=initMap">
    </script>
@endsection