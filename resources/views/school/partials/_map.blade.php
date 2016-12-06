<style>
        #map {
            height: 600px;
            width: 100%;
        }

        .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 300px;
        }

        #pac-input:focus {
          border-color: #4d90fe;
        }

        .pac-container {
          font-family: Roboto;
        }

        #type-selector {
          color: #fff;
          background-color: #4d90fe;
          padding: 5px 11px 0px 11px;
        }

        #type-selector label {
          font-family: Roboto;
          font-size: 13px;
          font-weight: 300;
        }
        #target {
          width: 345px;
        }
    </style>

<div class="form-group">
    {{Form::label('school location', 'School location')}}

    </br>
    Search the school location by using the searchbox or by clicking at the map
    {{ $location->latitude or null }}
    <input name="lat" type="hidden" id="lat" value="{{ $location->latitude or null }}">
    <input name="lng" type="hidden" id="lng" value="{{ $location->longtitude or null }}">
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">

    <div id="map"></div>

</div>


<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgdkEKOxECZPSbpr7MvPZMLH7sBGeIbV8&libraries=places&callback=initMap">
</script>
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

            // Create a marker for each place.
            var searchEditMarker = new google.maps.Marker({
                map: map,
                position: pastLocation,
            });


            map.addListener('click', function (e) {
                placeMarkerAndPanTo(e.latLng, map);
                $("#lat").val(e.latLng.toJSON().lat);
                $("#lng").val(e.latLng.toJSON().lng);
                console.log("Input lat value : " + $("#lat").val());
                console.log("Input lng value : " + $("#lng").val());

            });

            var searchInput = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(searchInput);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchInput);

            searchBox.addListener('places_changed', function() {
              var places = searchBox.getPlaces();

              if (places.length == 0) {
                return;
              }

              // Clear out the old markers.
              newMarker.forEach(function(marker) {
                marker.setMap(null);
              });
              newMarker = [];


              // For each place, get the icon, name and location.
              var bounds = new google.maps.LatLngBounds();
              places.forEach(function(place) {
                if (!place.geometry) {
                  console.log("Returned place contains no geometry");
                  return;
                }

                // Create a marker for each place.
                var searchMarker = new google.maps.Marker({
                   map: map,
                   title: place.name,
                   position: place.geometry.location,
                });

                var searchInfoWindow = new google.maps.InfoWindow({
                    content: 'Your school Location'
                });

                searchMarker.addListener('click', function() {
                    searchInfoWindow.open(map,searchMarker);
                });

                newMarker.push(searchMarker);

                $("#lat").val(place.geometry.location.toJSON().lat);
                $("#lng").val(place.geometry.location.toJSON().lng);
                console.log("Input lat value : " + $("#lat").val());
                console.log("Input lng value : " + $("#lng").val());

                if (place.geometry.viewport) {
                  // Only geocodes have viewport.
                  bounds.union(place.geometry.viewport);
                } else {
                  bounds.extend(place.geometry.location);
                }
              });
              map.fitBounds(bounds);
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
            });

            var infoWindow = new google.maps.InfoWindow({
                content: 'Your school Location'
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
