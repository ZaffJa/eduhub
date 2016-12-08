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
    </style>
    <link href="/css/jquery-ui.css" rel="stylesheet"/>
    <div class="row">

        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-profile">
                        <div class="card-header card-background card-background-main">
                            <img src="/img/logo/logocvr.png" style="max-height:100px; width:100%; max-width:400px; "
                                 alt="Norway">
                        </div>
                        <div class="card-avatar">
                            <a href="">
                                <img class="img"
                                     src="https://upload.wikimedia.org/wikipedia/ms/3/3d/Sekolah_Menengah_Kebangsaan_Perimbun.png"
                                     style="background-color:white;">
                            </a>
                        </div>
                        <div class="card-content">

                            <h2 class="card-title">
                                {{ $school-> name or null }}
                            </h2>
                            <h3 class="category">Visi</h3>
                            <p>{{ $school->vision or 'Belum di isi'}}</p>
                            <h3 class="category">Misi</h3>
                            <p>{{ $school->mission or 'Belum di isi' }}.</p>
                            <h3 class="category">Objektif</h3>
                            <p>{{ $school->objective or 'Belum di isi'}}.</p>
                            <a class="btn btn-round btn-success" href="#">Edit</a>

                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Hubungi Sekolah --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="card  ">
                            <div class="card-header card-background card-background-contact">
                                <h2 class="title"><b>Hubungi Sekolah</b></h2>
                            </div>
                            <div class="card-content ">
                                <h3 class="category"><b>Alamat Sekolah</b></h3>
                                {{ $school->address or 'Belum di isi' }}
                            </div>
                            <div class="card-content ">
                                <h3 class="category"><b>No Telefon Sekolah</b></h3>
                                {{ $school->telephone or 'Belum di isi' }}
                            </div>
                            <div class="card-content ">
                                <h3 class="category"><b>Faks Sekolah</b></h3>
                                {{ $school->fax or 'Belum di isi' }}
                            </div>
                        </div>
                    </div>
                    {{-- Kedudukan Sekolah --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="card  ">
                            <div class="card-header card-background card-background-sub-table">
                                <h2 class="title"><b>Kedudukan Sekolah</b></h2>
                            </div>
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
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-danger">
                                    <tr>
                                        <th>School Name</th>
                                        <th>Ranking</th>
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
                <div class="row">
                    {{-- Aliran Sekolah --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="card ">
                            <div class="card-header card-background card-background-sub-table">
                                <h2 class="title"><b>Aliran Sekolah</b></h2>
                            </div>
                            <div class="card-content ">
                                <h3 class="category"><b>{{ $school->stream->stream or 'Belum di isi' }}</b></h3>
                            </div>
                        </div>
                    </div>
                    {{-- Syarat Masuk Sekolah --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="card  ">
                            <div class="card-header card-background card-background-sub-table">
                                <h2 class="title"><b>Syarat Masuk</b></h2>
                            </div>
                            <div class="card-content ">
                                <h3 class="category"><b>{{ $school->schoolType->requirements or 'Belum di isi' }}</b></h3>
                                Untuk maklumat lanjut klik <strong><a href="{{ $school->typSchool->link or '#'}}">sini</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Peta Sekolah--}}
                    <div class="col-md-12 col-lg-12">
                        <div class="card card-profile">
                            <div class="card-header card-background card-background-sub">
                                <h2 class="title"><b>School Location</b></h2>
                            </div>
                            <div class="card-content">
                                <div class="text-center">
                                    <form class="navbar-form " role="search">
                                        <div class="form-group is-empty">
                                            <input type="text" class="form-control" id="pac-input"
                                                   placeholder="School Name" oninput="searchName()"
                                                   onchange="searchName()">
                                            <span class="material-input"></span>
                                            <span class="material-input"></span></div>
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <span class="ripple-container"></span>
                                        </button>
                                    </form>
                                </div>

                                <div id="map"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
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
                if (schoolData[i][0].includes(search)) {
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
                    ["{{$school->school->name or null}}",
                        position = new google.maps.LatLng
                        (
                                parseFloat("{{$school->latitude}}").toFixed(6),
                                parseFloat("{{$school->longtitude}}").toFixed(6)
                        )]
            );
                    @endforeach

                    @foreach ($schoolLocation as $key=>$school)
            var schoolPosition = new google.maps.LatLng(
                    parseFloat("{{$school->latitude}}").toFixed(6),
                    parseFloat("{{$school->longtitude}}").toFixed(6)
                    );

            schoolMarker['{{$key}}'] = new google.maps.Marker({
                position: schoolPosition,
                map: map,
                title: 'School location',
                icon: '/img/logo/map-00.png'
            });

            schoolInfo['{{$key}}'] = new google.maps.InfoWindow({
                content: "{{$school->school->name or null}}"
            })

            schoolMarker['{{$key}}'].addListener('click', function () {
                schoolInfo['{{$key}}'].open(map, schoolMarker['{{$key}}'])
            });
            @endforeach

        }
    </script>
@endsection
