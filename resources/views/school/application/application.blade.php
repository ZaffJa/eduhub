@extends('school.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header card-background text-center" data-background-color="blue">

                    <h2 class=" card-title "><b>Cara Memohon ke <i class="material-icons"></i></b></h2>


                </div>
                <div class="card-footer"></div>
                <div class="col-lg-10 col-lg-offset-1 ">
                    <div class="card-header-pills card-background " data-background-color="red">
                        <h4 class=" title"><b>Sekolah Berasrama Penuh</b><span data-toggle="collapse" data-target="#demo" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>
                    </div>
                    <div id="demo" class="collapse">
                        <div class="card-content " >
                            <h3 class="category"><b>Permohonan untuk bakal pelajar Tingkatan 1</b></h3>
                            <h4 class="category">Permohonan Atas Talian</h4>
                            <a href="https://sst1.moe.gov.my">Pergi ke laman web</a>
                            <h4 class="category">Borang panduan Permohonan</h4>
                            <a href="https://sst1.moe.gov.my/spat1_mohon/panduan.cfm">Tengok panduan</a>

                            <h3 class="category"><b>Permohonan untuk bakal pelajar Tingkatan 4</b></h3>
                            <h4 class="category">Permohonan Atas Talian</h4>
                            <a href="https://sst4.moe.gov.my">Pergi ke laman web</a>
                            <h4 class="category">Borang panduan Permohonan</h4>
                            <a href="https://sst4.moe.gov.my/spat4_mohon/panduan.cfm">Tengok panduan</a>
                        </div></div>

                    <div class="card-footer"></div>
                    <div class="card-header-pills card-background " data-background-color="red">
                        <h4 class="title"><b>Kolej Vokasional & Sekolah Menengah Teknik</b><span data-toggle="collapse" data-target="#demo1" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>

                    </div>


                    <div id="demo1" class="collapse">
                        <div class="card-content " >
                            <h3 class="category"><b>Permohonan untuk bakal pelajar Tingkatan 4</b></h3>
                            <h4 class="category">Permohonan Atas Talian</h4>
                            <a href="https://sptv.moe.gov.my">Pergi ke laman web</a>
                            <h4 class="category">Borang panduan Permohonan</h4>
                            <a href="https://sptv.moe.gov.my/mohon_kvsmt/perdana/Panduan_Permohonan_SPTV_PERDANA.pdf">Tengok panduan</a>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                    <div class="card-header-pills card-background " data-background-color="red">
                        <h4 class="title"><b>Sekolah Kawalan</b><span data-toggle="collapse" data-target="#demo2" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>

                    </div>


                    <div id="demo2" class="collapse">
                        <div class="card-content " >
                            <h3 class="category"><b>Permohonan untuk bakal pelajar Tingkatan 4</b></h3>
                            <h4 class="category">Kategori Sekolah Kawalan</h4>
                            <ul>
                                <li>Sekolah Menengah Kebangsaan Agama (SMKA)</li>
                                <li>Sekolah Agama Bantuan Kerajaan (SABK)</li>
                                <li>Sekolah Kawalan/ Sekolah Rancangan Khas (SRK)/ Sekolah Elit/ Sekolah Rancangan Khas Negeri (RKN)</li>
                                <li>Kelas Kawalan/ Kelas Premier</li>
                                <li>Kelas Rancangan Khas (KRK)/Rancangan Khas Daerah (RKD)/ Sekolah Premier</li>
                                <li>Kelas Aliran Agama (KAA)</li>
                            </ul>
                            <h4 class="category">Permohonan Atas Talian</h4>
                            <a href="https://public.moe.gov.my">Pergi ke laman web</a>
                            <h4 class="category">Borang panduan Permohonan</h4>
                            <a href="https://public.moe.gov.my/panduan/MUAT_TURUN.pdf">Tengok panduan</a>
                        </div>
                    </div>
                    <div class="card-footer"></div>

                    <div class="card-header-pills card-background " data-background-color="red">
                        <h4 class="title"><b>Maktab Rendah Sains MARA(MRSM)</b><span data-toggle="collapse" data-target="#demo3" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>

                    </div>
                    <div id="demo3" class="collapse">
                        <div class="card-content " >
                            <h3 class="category"><b>Permohonan untuk bakal pelajar Tingkatan 1</b></h3>
                            <h4 class="category">Borang panduan Permohonan</h4>
                            <a href="https://mohon.mrsm.edu.my/form1/login.jsp">Pergi ke laman web</a>

                            <h3 class="category"><b>Permohonan untuk bakal pelajar Tingkatan 4</b></h3>
                            <h4 class="category">Borang panduan Permohonan</h4>
                            <a href="https://mohon.mrsm.edu.my/form4/login.jsp">Pergi ke laman web</a>
                        </div>

                    </div>
                    <div class="card-footer"></div>

                    <div class="card-header-pills card-background" data-background-color="red">
                        <h4 class="title"><b>Sekolah Seni</b><span data-toggle="collapse" data-target="#demo4" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>
                    </div>

                    <div id="demo4" class="collapse">
                    <div class="card-content " >
                        <h3 class="category"><b>Permohonan atas talian</b></h3>
                        <a href="https://essem.moe.gov.my/">Pergi ke laman web</a>
                    </div></div>
                    <div class="card-footer"></div>

                    <div class="card-header-pills card-background" data-background-color="red">
                        <h4 class="title"><b>Sekolah Sukan</b><span data-toggle="collapse" data-target="#demo5" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>
                    </div>
                    <div id="demo5" class="collapse">
                    <div class="card-content " >
                        <h3 class="category"><b>Senarai Sekolah Sukan</b></h3>
                        <ul>
                            <li>
                                Sekolah Sukan Bukit Jalil
                                <ul>
                                    <li>Kompleks Sukan Negara<br>
                                        57000 Kuala Lumpur<br>
                                        Tel : 03-90587335<br>
                                        Faks : 03-90587153<br>
                                        Kod Sekolah : WEA 0230</li>
                                </ul>
                            </li>
                            <li>
                                Sekolah Sukan Bandar Penawar
                                <ul>
                                    <li>
                                        81900 Kota Tinggi<br>
                                        Johor<br>
                                        Tel : 07-8223027<br>
                                        Faks : 07-8223028<br>
                                        Kod Sekolah : JEA 3015<br>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h3 class="category"><b>Sila berhubung terus dengan sekolah tersebut</b></h3>
                        <h3 class="category"><b>Untuk maklumat lanjuat sila kunjungi laman web MOE</b></h3>
                        <a href="http://www.moe.gov.my/my/sekolah-sukan-malaysia">Kunjungi laman web</a>
                    </div>
                    </div>
                    <div class="card-footer"></div>

                    <div class="card-header-pills card-background " data-background-color="red">
                        <h4 class="title"><b>Sekolah Harian</b><span data-toggle="collapse" data-target="#demo6" style="float: right"> More <i class="fa fa-angle-down"></i></span></h4>
                    </div>
                    <div id="demo6" class="collapse">
                    <div class="card-content " >
                        <h3 class="category"><b>Sila berhubung terus dengan sekolah tersebut</b></h3>
                    </div>
                    </div>
                    <div class="card-footer"></div>

                </div>
            </div>
            </div>
    </div>
@endsection