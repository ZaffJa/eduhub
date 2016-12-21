@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
<style>
        #map {
            height: 600px;
            width: 100%;
        }

        .ui-widget {
            margin-top: 1%;
        }

        .padding1pc {
            margin-top: 1%;
        }
</style>
<link href="/css/jquery-ui.css" rel="stylesheet" />
<div class="text-center">
        <input class="ui-widget input" id="pac-input"  type="text" placeholder="Name Sekolah" oninput="searchName()" onchange="searchName()">
</div>
<div id="map"></div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgdkEKOxECZPSbpr7MvPZMLH7sBGeIbV8&libraries=places&callback=initMap">
</script>
<script>
        var map;
        var schoolMarker = [];
        var schoolInfo = [];
        var schoolData = [];

        function searchName() {
            search = document.getElementById("pac-input").value;
            for (i = 0; i < schoolData.length; i++) {
                if ( schoolData[i][0].includes(search))
                {
                    map.panTo(schoolData[i][1]);
                }
            }
        }

        function initMap() {
            var pastLocation = new google.maps.LatLng(
                parseFloat("{{isset($location->latitude) ? $location->latitude : 1.5300076438874903}}").toFixed(6),
                parseFloat("{{isset($location->longtitude) ? $location->longtitude : 103.765869140625}}").toFixed(6)
            );

            map = new google.maps.Map(document.getElementById('map'), {
                center: pastLocation,
                zoom: 11,
            });

            @foreach($schoolLocation as $school)
            schoolData.push(
                new Array (
                    "{{$school->school->name}}",
                    position = new google.maps.LatLng
                    (
                        parseFloat("{{$school->latitude}}").toFixed(6),
                        parseFloat("{{$school->longtitude}}").toFixed(6)
                    )
                )
            );
            @endforeach

            @foreach ($schoolLocation as $key=>$school)
                var schoolPosition = new google.maps.LatLng(
                    parseFloat("{{$school->latitude}}").toFixed(6),
                    parseFloat("{{$school->longtitude}}").toFixed(6)
                );

                schoolMarker[{{$key}}] = new google.maps.Marker({
                    position : schoolPosition,
                    map: map,
                    title: 'School location',
                    icon: '/img/logo/map-00.png'
                });

                schoolInfo[{{$key}}] =  new google.maps.InfoWindow({
                    content: "{{$school->school->name}}"
                })

                schoolMarker[{{$key}}].addListener('click', function() {
                    schoolInfo[{{$key}}].open(map, schoolMarker[{{$key}}])
                });
            @endforeach

        }
</script>
@endsection
