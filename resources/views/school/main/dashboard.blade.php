@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
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
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-profile">
                    <div class="card-header card-background card-background-main">
                        <img src="/img/logo/logocvr.png" style="max-height:100px; width:100%; max-width:400px; " alt="Norway">
                    </div>
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="/img/avatar/boy-512-03.png" style="background-color:white;">
                        </a>
                    </div>

                    <div class="content">

                        <p class="card-content">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 hidden-xs ">
                <div class="card ">
                    <div class="card-header " data-background-color="red">
                        <h4 class="title">News from eduhub.my </h4>
                    </div>


                    <div class="card-content">


                        <iframe src="https://eduhub.my/articles/" width="100%" height="500px"></iframe>
                    </div>
                </div>
            </div>
<div class="row">
            <div class="col-md-12 col-lg-6" >
                <div class="card  ">
                    <div class="card-header card-background card-background-sub-table">
                        <h2 class="title"><b>School Ranking</b></h2>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="card-content table-responsive" >
                        <table class="table" height="100px">
                            <thead class="text-danger">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-primary">$38,735</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table" height="300px">
                            <thead class="text-danger">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-primary">$38,735</td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td class="text-primary">$63,542</td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td class="text-primary">$78,615</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div class="card  ">
                    <div class="card-header card-background card-background-sub-table">
                        <h2 class="title"><b>School Subject Streams</b></h2>

                    </div>
                    <div class="card-content table-responsive">

                        <p class="category card-title">Steams that this school offers</p>
                        <table class="table">
                            <thead class="text-danger">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-primary">$38,735</td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td class="text-primary">$63,542</td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td class="text-primary">$78,615</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card  ">
                    <div class="card-header card-background card-background-sub-table">
                        <h2 class="title"><b>School Requirements</b></h2>

                    </div>
                    <div class="card-content table-responsive">
                        <p class="category card-title">Requirement to enter this school</p>
                        <table class="table">
                            <thead class="text-danger">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-primary">$38,735</td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td class="text-primary">$63,542</td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td class="text-primary">$78,615</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card card-profile">
                    <div class="card-header card-background card-background-sub">
                        <h2 class="title"><b>School Location</b></h2>
                    </div>
                    <div class="card-content">
                      <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                      <div id="map"></div>
                    </div>
                    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>

                </div>
            </div>
        </div>
    </div>
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
        var schoolMarker = [];
        var schoolInfo = [];




        function initMap() {
            var pastLocation = new google.maps.LatLng(
                    parseFloat("{{isset($location->latitude) ? $location->latitude : 1.5300076438874903}}").toFixed(6),
                    parseFloat("{{isset($location->longtitude) ? $location->longtitude : 103.765869140625}}").toFixed(6)
            );

            map = new google.maps.Map(document.getElementById('map'), {
                center: pastLocation,
                zoom: 11,
            });

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
