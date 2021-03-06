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

        .ui-widget {
            margin-top: 1%;
        }

        .padding1pc {
            margin-top: 1%;
        }

        .label {

            font-size: 130%;

        }
    </style>
    <link href="/css/jquery-ui.css" rel="stylesheet"/>
    <div class="row">


        <div class="col-lg-8 col-lg-offset-2">
            <div class="row">
                <div class="row">
                <div class="col-md-12">
                    <div class="card card-profile" >
                        <div class="card-header card-background card-background-main">
                            <img src="/img/logo/logocvr.png" style="max-height:100px; width:100%; max-width:400px; margin-bottom: -135px; "
                                 alt="Norway">
                        </div>
                        {{--<div class="card-avatar">--}}
                        {{--<a href="">--}}
                        {{--<img class="img"--}}
                        {{--src="https://upload.wikimedia.org/wikipedia/ms/3/3d/Sekolah_Menengah_Kebangsaan_Perimbun.png"--}}
                        {{--style="background-color:white;">--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        <div class="card-content">

                            <h2 class="card-title">
                                {{ $school-> name or null }}
                            </h2>
                            <a class="btn btn-round btn-info" href="{{ action('School\SchoolController@application') }}">Cara Memohon</a>

                            @if(auth()->user())
                                <a class="btn btn-round btn-success"
                                   href="{{ action('School\SchoolController@edit',$school->slug) }}">Edit</a>
                            @endif

                        </div>
                    </div>
                </div>
                </div>

                    {{-- Hubungi Sekolah --}}
                    <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card" style="min-height: 200px;">
                            <div class="card-header card-header-icon" data-background-color="orange">
                                <i class="material-icons">contacts</i>

                            </div>
                            <div class="card-content">
                                <h3 class="title">Hubungi Sekolah</h3>

                                    <h3 class="category"><b>Alamat Sekolah</b></h3>
                                    {{ $school->address or 'Belum di isi' }}


                                <h3 class="category"><b>No Telefon Sekolah</b></h3>
                                +0{{ $school->telephone or 'Belum di isi' }}

                                <h3 class="category"><b>Faks Sekolah</b></h3>
                                +0{{ $school->fax or 'Belum di isi' }}

                                <h3 class="category"><b>Media Sosial Sekolah</b></h3>
                                <a href="{{ $school->facebook or '#' }}" class="btn btn-social btn-facebook btn-round sharrre"><i class="fa fa-facebook"></i> Facebook<div class="ripple-container"></div></a>

                                <a href="{{ $school->instagram or '#' }}" class="btn btn-social btn-instagram btn-round sharrre"><i class="fa fa-instagram"></i> Instagram<div class="ripple-container"></div></a>

                                <a href="{{ $school->twitter or '#' }}" class="btn btn-social btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> Twitter<div class="ripple-container"></div></a>

                            </div>
                        </div>

                    </div>
                    {{-- Kedudukan Sekolah --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="card" style="min-height: 200px;">
                            <div class="card-header card-header-icon" data-background-color="red">
                                <i class="material-icons">trending_up</i>

                            </div>
                            <div class="card-content">
                                <h3 class="title">Kedudukan Sekolah</h3>
                                @if($school->typeSchool->id == 8 || $school->typeSchool->id == 12)
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama sekolah ini</th>
                                            <th>Kedudukan sekolah</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $school->name or 'Belum di isi' }}</td>
                                            <td style="text-align: center;">{{ $school->rank or 'Belum di isi' }}</td>
                                        </tr>
                                    </table>
                                @endif
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-danger">
                                        <tr>
                                            <th>Nama Sekolah</th>
                                            <th>Kedudukan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($schoolRank as $rank)
                                            <tr>
                                                <td>{!! $rank->name == $school->name ? "<strong> $rank->name </strong>" : $rank->name !!}</td>
                                                <td>{{$rank->rank}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Aliran Sekolah --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="card" style="min-height: 200px;">
                            <div class="card-header card-header-icon" data-background-color="orange">
                                <i class="material-icons">pie_chart_outlined</i>

                            </div>
                            <div class="card-content">
                                <h3 class="title">Aliran Sekolah</h3>
                                <h3 class="category text-center">
                                    <img src="/img/icon/pencil.png" style="height: 15%; width: 15%"/>
                                    <h3 class="text-center"><b>{{ $school->stream->stream or 'Belum di isi' }}</b></h3>
                                </h3>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card" style="min-height: 200px;">
                            <div class="card-header card-header-icon" data-background-color="purple">
                                <i class="material-icons">subject</i>
                            </div>
                            <div class="card-content">
                                <h3 class="title">Syarat Kemasukan</h3>
                                <h3 class="category text-center">
                                    <img src="/img/icon/stationery.png" style="height: 15%; width: 15%"/>
                                    @if(isset($school->typeSchool->requirements))
                                        <p>{!! $school->typeSchool->requirements !!}</p>
                                    @else
                                        <h3 class="text-center"><b>Sila hubungi sekolah itu</b></h3>
                                    @endif
                                </h3>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    {{-- Peta Sekolah--}}

                    <div class="col-md-12 col-lg-12">
                        <div class="card" style="min-height: 200px;">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">language</i>
                            </div>
                            <div class="card-content">
                                <h2 class="title">Lokasi Sekolah</h2>
                                <div id="map"></div>
                            </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChsUkNrNkS74PBi73WuMHZyAjQhQWt-sg&libraries=places&callback=initMap">
    </script>
    <script>
        var map;
        var schoolMarker = null;
        var schoolInfo = null;
        var schoolData = null;

        function searchName() {
            var search = document.getElementById("pac-input").value;
            for (i = 0; i < schoolData.length; i++) {
                if (schoolData[i][0].includes(search)) {
                    map.panTo(schoolData[i][1]);
                }
            }
        }

        function initMap() {
            var pastLocation = new google.maps.LatLng(
                    parseFloat("{{$school->location->latitude or 1.5300076438874903}}").toFixed(6),
                    parseFloat("{{$school->location->longtitude or 103.765869140625}}").toFixed(6)
            );

            map = new google.maps.Map(document.getElementById('map'), {
                center: pastLocation,
                zoom: 11,
            });

            var schoolPosition = new google.maps.LatLng(
                    parseFloat("{{$school->location->latitude or null}}").toFixed(6),
                    parseFloat("{{$school->location->longtitude or null}}").toFixed(6)
            );

            schoolMarker = new google.maps.Marker({
                position: schoolPosition,
                map: map,
                title: 'School location',
                icon: '/img/logo/map-00.png'
            });

            schoolInfo = new google.maps.InfoWindow({
                content: "{{$school->name or null}}"
            });

            schoolMarker.addListener('click', function () {
                schoolInfo.open(map, schoolMarker)
            });
        }

    </script>
@endsection
