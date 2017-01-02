@extends('school.personality.app')


@section('content')
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="azure" id="wizard">
            <form method="get" action="{{ action('School\PublicPersonalityController@result') }}"  id="form_data">
                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

                <div class="wizard-header">
                    <h3 class="wizard-title">Ujian Personality</h3>
                    <p class="category">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda sebanyak mana kotak yang anda suka. </p>
                </div>

                <div class="wizard-navigation">
                    <div class="progress-with-circle">
                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="6" style="width: 21%;"></div>
                    </div>
                    <ul>
                        <li>
                            <a href="#details" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="ti-list"></i>
                                </div>
                                Set 1
                            </a>
                        </li>
                        <li>
                            <a href="#captain" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="ti-list"></i>
                                </div>
                                Set 2
                            </a>
                        </li>
                        <li>
                            <a href="#description" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="ti-list"></i>
                                </div>
                                Set 3
                            </a>
                        </li>
                        <li>
                            <a href="#details2" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="ti-list"></i>
                                </div>
                                Set 4
                            </a>
                        </li>
                        <li>
                            <a href="#captain2" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="ti-list"></i>
                                </div>
                                Set 5
                            </a>
                        </li>
                        <li>
                            <a href="#description2" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="ti-list"></i>
                                </div>
                                Set 6
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane" id="details">
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-4">


                                <input type="checkbox" class="css-checkbox" id="checkbox16"  name="a1" value="1" />
                                <label for="checkbox16" name="checkbox16_lbl" class="css-label dark-plus-cyan">Membaiki Kereta</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox161"  name="b2" value="1"/>
                                <label for="checkbox161" name="checkbox161_lbl" class="css-label dark-plus-cyan">Menghasilkan rekaan pakaian </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox162"  name="c3" value="1" />
                                <label for="checkbox162" name="checkbox162_lbl" class="css-label dark-plus-cyan">Menyelia kerja orang bawahan</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox163"  name="d4" value="1" />
                                <label for="checkbox163" name="checkbox163_lbl" class="css-label dark-plus-cyan">Bekerja dalam makmal sains </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox164"  name="e5" value="1" />
                                <label for="checkbox164" name="checkbox164_lbl" class="css-label dark-plus-cyan">Menolong orang kurang upaya </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox165"  name="f6" value="1" />
                                <label for="checkbox165" name="checkbox165_lbl" class="css-label dark-plus-cyan">Mengimbang bajet </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox166"  name="a7" value="1" />
                                <label for="checkbox166" name="checkbox166_lbl" class="css-label dark-plus-cyan">Bekerja dengan haiwan </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox167"  name="b8" value="1" />
                                <label for="checkbox167" name="checkbox167_lbl" class="css-label dark-plus-cyan">Menggubah bunga </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox168"  name="c9" value="1" />
                                <label for="checkbox168" name="checkbox168_lbl" class="css-label dark-plus-cyan">Bekerja dalam kempen politik </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox169"  name="d1" value="1" />
                                <label for="checkbox169" name="checkbox169_lbl" class="css-label dark-plus-cyan">Mengkasi punca penyakit</label>
                                <br>


                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane" id="captain">
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-4">


                                <input type="checkbox" class="css-checkbox" id="checkbox26"  name="a2" value="1" />
                                <label for="checkbox26" name="checkbox26_lbl" class="css-label dark-plus-cyan">Pertukangan kayu </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox261"  name="b3" value="1"/>
                                <label for="checkbox261" name="checkbox261_lbl" class="css-label dark-plus-cyan">Menghias rumah atau pejabat</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox262"  name="c4" value="1" />
                                <label for="checkbox262" name="checkbox262_lbl" class="css-label dark-plus-cyan">Memulakan kelab </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox263"  name="d5" value="1" />
                                <label for="checkbox263" name="checkbox263_lbl" class="css-label dark-plus-cyan">Mencari penyelesaian kepada masalah alam sekitar </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox264"  name="e6" value="1" />
                                <label for="checkbox264" name="checkbox264_lbl" class="css-label dark-plus-cyan">Menjadi sukarelawan </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox265"  name="f7"" value="1" />
                                <label for="checkbox265" name="checkbox265_lbl" class="css-label dark-plus-cyan">Menggunakan komputer </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox266"  name="a8" value="1" />
                                <label for="checkbox266" name="checkbox266_lbl" class="css-label dark-plus-cyan">Mengendalikan alatan berkuasa tinggi </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox267"  name="b9" value="1" />
                                <label for="checkbox267" name="checkbox267_lbl" class="css-label dark-plus-cyan">Menghasilkan video </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox268"  name="c1" value="1" />
                                <label for="checkbox268" name="checkbox268_lbl" class="css-label dark-plus-cyan">Memulakan bisnes sendiri </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox269"  name="d2" value="1" />
                                <label for="checkbox269" name="checkbox269_lbl" class="css-label dark-plus-cyan">Terlibat dalam projek sains </label>
                                <br>


                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane" id="description">
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-4">


                                <input type="checkbox" class="css-checkbox" id="checkbox36"  name="b1" value="1" />
                                <label for="checkbox36" name="checkbox36_lbl" class="css-label dark-plus-cyan">Menyanyi di khalayak ramai </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox361"  name="c2" value="1"/>
                                <label for="checkbox361" name="checkbox361_lbl" class="css-label dark-plus-cyan">Memberi ucapan </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox362"  name="d3" value="1" />
                                <label for="checkbox362" name="checkbox362_lbl" class="css-label dark-plus-cyan">Mengkaji anatomi manusia</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox363"  name="e4" value="1" />
                                <label for="checkbox363" name="checkbox363_lbl" class="css-label dark-plus-cyan">Menemu bual klien </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox364"  name="f5" value="1" />
                                <label for="checkbox364" name="checkbox364_lbl" class="css-label dark-plus-cyan">Peka dengan persekitaran </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox365"  name="a5" value="1" />
                                <label for="checkbox365" name="checkbox365_lbl" class="css-label dark-plus-cyan">Menahan pelanggar undang-undang </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox366"  name="b6" value="1" />
                                <label for="checkbox366" name="checkbox366_lbl" class="css-label dark-plus-cyan">Menghasilkan poster </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox367"  name="c7" value="1" />
                                <label for="checkbox367" name="checkbox367_lbl" class="css-label dark-plus-cyan">Mengetuai perjumpaan </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox368"  name="d8" value="1" />
                                <label for="checkbox368" name="checkbox368_lbl" class="css-label dark-plus-cyan">Menyelesaikan masalah matematik</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox369"  name="e9" value="1" />
                                <label for="checkbox369" name="checkbox369_lbl" class="css-label dark-plus-cyan">Mengajar remaja atau dewasa</label>
                                <br>


                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane" id="details2">
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-4">


                                <input type="checkbox" class="css-checkbox" id="checkbox46"  name="a6" value="1" />
                                <label for="checkbox46" name="checkbox46_lbl" class="css-label dark-plus-cyan">Menanam pokok </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox461"  name="d7" value="1"/>
                                <label for="checkbox461" name="checkbox461_lbl" class="css-label dark-plus-cyan">Mengkaji sistem solar </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox462"  name="e3" value="1" />
                                <label for="checkbox462" name="checkbox462_lbl" class="css-label dark-plus-cyan">Menolong orang yang dalam kesedihan </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox463"  name="f2" value="1" />
                                <label for="checkbox463" name="checkbox463_lbl" class="css-label dark-plus-cyan">Mengendali mesin untuk bisnes </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox464"  name="c8" value="1" />
                                <label for="checkbox464" name="checkbox464_lbl" class="css-label dark-plus-cyan">Mengetuai projek </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox465"  name="a9" value="1" />
                                <label for="checkbox465" name="checkbox465_lbl" class="css-label dark-plus-cyan">Memandu trak </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox466"  name="d6" value="1" />
                                <label for="checkbox466" name="checkbox466_lbl" class="css-label dark-plus-cyan">Mengumpul batu dan mineral </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox467"  name="e8" value="1" />
                                <label for="checkbox467" name="checkbox467_lbl" class="css-label dark-plus-cyan">Membuat orang ketawa </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox468"  name="b4" value="1" />
                                <label for="checkbox468" name="checkbox468_lbl" class="css-label dark-plus-cyan">Berlakon </label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox469"  name="f4" value="1" />
                                <label for="checkbox469" name="checkbox469_lbl" class="css-label dark-plus-cyan">Menerima mesej telefon </label>
                                <br>


                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane" id="captain2">
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-4">


                                <input type="checkbox" class="css-checkbox" id="checkbox56"  name="b5" value="1" />
                                <label for="checkbox56" name="checkbox56_lbl" class="css-label dark-plus-cyan">Menulis puisi atau cerita</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox561"  name="e7" value="1"/>
                                <label for="checkbox561" name="checkbox561_lbl" class="css-label dark-plus-cyan">Belajar psikologi</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox562"  name="f3" value="1" />
                                <label for="checkbox562" name="checkbox562_lbl" class="css-label dark-plus-cyan">Menyusun tempat kerja</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox563"  name="d9" value="1" />
                                <label for="checkbox563" name="checkbox563_lbl" class="css-label dark-plus-cyan">Mengkaji haiwan dan tumbuhan</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox564"  name="a4" value="1" />
                                <label for="checkbox564" name="checkbox564_lbl" class="css-label dark-plus-cyan">Belajar elektronik</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox565"  name="e1" value="1" />
                                <label for="checkbox565" name="checkbox565_lbl" class="css-label dark-plus-cyan">Bekerja dengan kanak-kanak</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox566"  name="f9" value="1" />
                                <label for="checkbox566" name="checkbox566_lbl" class="css-label dark-plus-cyan">Menghasilkan sistem fail</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox567"  name="e2" value="1" />
                                <label for="checkbox567" name="checkbox567_lbl" class="css-label dark-plus-cyan">Menjaga orang sakit</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox568"  name="a3" value="1" />
                                <label for="checkbox568" name="checkbox568_lbl" class="css-label dark-plus-cyan">Bekerja di lapangan</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox569"  name="c5" value="1" />
                                <label for="checkbox569" name="checkbox569_lbl" class="css-label dark-plus-cyan">Menyimpan wang</label>
                                <br>


                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="tab-pane" id="description2">
                        <div class="row">

                            <div class="col-lg-8 col-lg-offset-4">


                                <input type="checkbox" class="css-checkbox" id="checkbox66"  name="c6" value="1" />
                                <label for="checkbox66" name="checkbox66_lbl" class="css-label dark-plus-cyan">Menjual barang</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox661"  name="b7" value="1"/>
                                <label for="checkbox661" name="checkbox661_lbl" class="css-label dark-plus-cyan">Menghasilkan arca</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox662"  name="f1" value="1" />
                                <label for="checkbox662" name="checkbox662_lbl" class="css-label dark-plus-cyan">Meyimpan laporan dengan teliti</label>
                                <br>
                                <input type="checkbox" class="css-checkbox" id="checkbox663"  name="f8" value="1" />
                                <label for="checkbox663" name="checkbox663_lbl" class="css-label dark-plus-cyan">Mengesahkan dokumen</label>
                                <br>



                            </div>
                            <hr>


                            <div class="col-lg-12 ">
                                <div class="form-group has-success">
                                    <h3>Sila isi Emel untuk keputusan :</h3>
                                    <input type="email" name="email" id="email" placeholder="Emel" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wizard-footer">
                    <div class="pull-right">
                        <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Seterusnya' />

                        <button class="btn btn-finish btn-fill btn-primary btn-wd" name="finish" type="submit">Selesai</button>

                    </div>

                    <div class="pull-left">
                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Kembali' />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>


@endsection
