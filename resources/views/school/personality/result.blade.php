@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
    <script type="text/javascript">
        var data = [];
        var type = [];
        @foreach($res as $r)
        data.push('{{$r[1]}}' * 1);
        type.push('{{$r[0]}}'.charAt(0));
        @endforeach
    </script>
    @if (isset($status))
        <script>
            $.notify({
                message: "<strong>{{ $status }}</strong>"
            }, {
                type: 'warning'
            });
        </script>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Keputusan Personaliti </h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                        <tr>
                            <th>Skor anda</th>
                            <th>Jenis</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($res as $r)
                            <tr>
                                <td>{{$r[1]}}</td>
                                <td>{{$r[0]}} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <h4 class="title">Ini adalah keputusan ujian personaliti anda</h4>
                        <h3>Anda adalah seorang {{$res[0][0]}} </h3>
                        <h4>
                            @foreach($personalityType as $pt)
                                @if($res[0][0] == $pt->jenis)
                                    {{$pt->deskripsi}}
                                    <script type="text/javascript">
                                        $('#{{$pt->jenis}}').attr({'aria-expanded': true});
                                    </script>
                                @endif
                            @endforeach
                        </h4>
                        <h3>Cadangan kursus untuk anda</h3>
                        @foreach($course as $c)
                            <h5>
                                {{$c->name_en}} at {{$c->institution->institution->name}}
                            </h5>
                        @endforeach
                        <h3>Cadangan karier untuk anda</h3>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <!-- Wrapper for slides -->
                            <div>
                                @foreach($careerImage as $ci)
                                    <div class="col-md-4">
                                        <img src="/img/{{$ci->path}}" class="thumbnail" alt="Chania" width="460"
                                             height="345">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <div id="container" style="min-width: 100px; max-width: 600px; height: auto; margin: auto;"></div>
                </div>
                <div class="card-footer">
                    <h5>R = Realistik, A = Artistik, I = Investigatif, E = Berdaya Usaha, S = Sosial, C =
                        Konvensional</h5>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {

                Highcharts.chart('container', {

                    chart: {
                        polar: true,
                        type: 'line'
                    },

                    title: {
                        text: 'Personality',
                        x: -40
                    },

                    pane: {
                        size: '80%'
                    },

                    xAxis: {
                        categories: type,
                        tickmarkPlacement: 'on',
                        lineWidth: 0
                    },

                    yAxis: {
                        gridLineInterpolation: 'polygon',
                        lineWidth: 0,
                        min: 0
                    },

                    tooltip: {
                        shared: true,
                        pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b><br/>'
                    },

                    legend: {
                        align: 'right',
                        verticalAlign: 'top',
                        y: 70,
                        layout: 'vertical'
                    },

                    series: [{
                        color: "red",
                        name: 'Score',
                        data: data,
                        pointPlacement: 'on'
                    }]

                });
            });
        </script>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Deskripsi Personaliti (tekan untuk besarkan)</h4>
                </div>
                <div class="card-content">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Realistic"
                                   aria-expanded="false" aria-controls="Realistic" class="collapsed">
                                    <h4 class="panel-title">
                                        Realistik
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="Realistic" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne" aria-expanded="false">
                                <div class="panel-body">
                                    Realistik. Mereka adalah orang yang suka menyelesaikan masalah secara praktikal.
                                    Mereka mungkin mempunyai kelebihan dari segi atletik atau skil mekanikal. Mereka
                                    cenderung untuk bekerja dengan mesin, tumbuhan dan/atau haiwan. Mungkin cenderung
                                    untuk bekerja di lapangan. Mereka suka menyiapkan tugas. Mereka boleh diharap,
                                    menepati masa dan rajin. Karier yang berkemungkinan ada cef, jurutera, pegawai
                                    polis, pemandu kapal terbang, atlit, askar dan pegawai bomba.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#Investigative" aria-expanded="false" aria-controls="Investigative">
                                    <h4 class="panel-title">
                                        Investigatif
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="Investigative" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    Investigatif. Mereka adalah orang yang suka aktiviti yang melibatkan pemikiran
                                    berbanding aktiviti fizikal. Mereka suka memerhati, belajar, menyiasat, menganalisa,
                                    menyelesaikan masalah. Mereka adalah orang saintifik, mereka tertarik dengan
                                    kejadian sesuatu benda. Mereka selalunya memiliki kelebihan dari segi matematik dan
                                    pemikiran logik. Mereka mungkin sedikit komples, selalu tertanya-tanya tentang
                                    sesuatu perkara, mementingkan kajian dan tenang. Karier yang berkemungkinan adalah
                                    arkitek, saintis komputer, doktor dan ahli farmasi.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#Artistic" aria-expanded="false" aria-controls="Artistic">
                                    <h4 class="panel-title">
                                        Artistik
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="Artistic" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    Artistik. Mereka adalah orang yang inovatif, memiliki tahap intuitif yang tinggi dan
                                    suka bekerja dalam situasi yang tidak berstruktur dengan menggunakan imaginasi dan
                                    kreativiti. Mereka suka luahkan diri mereka melalui kerja. Karier yang
                                    berkemungkinan adalah ahli muzik, artis, penulis dan peguam.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#Social" aria-expanded="false" aria-controls="Social">
                                    <h4 class="panel-title">
                                        Sosial
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="Social" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    Sosial. Mereka adalah orang yang suka menolong orang lain, menyampaikan berita,
                                    mengajar dan menghasilkan sesuatu. Selalunya berkemahiran dalam bercakap. Mereka
                                    mempunyai empati yang tinggi terhadap orang lain. Karier yang berkemungkinan adalah
                                    pekerja sosial, kaunselor, ahli terapi dan cikgu.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#Enterprising" aria-expanded="false" aria-controls="Enterprising">
                                    <h4 class="panel-title">
                                        Berdaya usaha
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="Enterprising" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    Berdaya usaha. Mereka adalah orang yang suka aktiviti berkaitan memulakan sesuatu
                                    seperti melaksanakan projek terutamanya bisnes. Mereka suka mempengaruh, memujuk,
                                    mengetuai kumpulan dan memilih keputusan. Mereka senang bosan dan kurang selesa
                                    dengan rutin harian. Mereka cenderung bekerja dengan cara unik mereka dan juga suka
                                    mengambil risiko. Karier yang berkemungkinan adalah pemilik bisnes, peguam, penjual,
                                    ejen hartanah dan admin sekolah.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingSix">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#Conventional" aria-expanded="false" aria-controls="Conventional">
                                    <h4 class="panel-title">
                                        Konvensional
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="Conventional" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingSix" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    Konvensional. Mereka adalah orang yang suka bekerja dengan data, mempunyai skill
                                    numerik atau perkeranian dan suka melakukan sesuatu mengikut prosedur dan rutin.
                                    Mereka mahir dalam menyelaraskan orang, tempat dan acara. Karier yang berkemungkinan
                                    adalah akauntan, setiausaha, pembantu doktor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--  Charts Plugin -->
