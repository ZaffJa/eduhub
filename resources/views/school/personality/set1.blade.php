@extends('school.personality.app')


@section('content')
    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="azure" id="wizard">
            <form method="get" action="{{ action('School\PublicPersonalityController@set2') }}">
                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

                <div class="wizard-header">
                    <h3 class="wizard-title">Ujian Personality</h3>
                    <p class="category">Book from thousands of unique work and meeting spaces.</p>
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
                            <br>
                            <div class="col-lg-8 col-lg-offset-4">


                                        <input type="checkbox" class="css-checkbox" id="checkbox16"  name="a1" value="1" />
                                        <label for="checkbox16" name="checkbox16_lbl" class="css-label dark-plus-cyan">Membaiki Kereta</label>


                                    <div class="checkbox">
                                        <label class="checkbox">
                                            <input type="checkbox" name="b2" value="1">Menghasilkan rekaan pakaian </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox">
                                            <input type="checkbox" name="c3" value="1">Menyelia kerja orang bawahan </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="d4" value="1">Bekerja dalam makmal sains </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="e5" value="1">Menolong orang kurang upaya </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="f6" value="1">Mengimbang bajet </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="a7" value="1">Bekerja dengan haiwan </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="b8" value="1">Menggubah bunga </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="c9" value="1">Bekerja dalam kempen politik </br>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="d1" value="1">Mengkasi punca penyakit </br>
                                        </label>
                                    </div>


                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="captain">

                    </div>
                    <div class="tab-pane" id="description">

                    </div>
                    <div class="tab-pane" id="details2">

                    </div>
                    <div class="tab-pane" id="captain2">

                    </div>
                    <div class="tab-pane" id="description2">

                    </div>
                </div>
                <div class="wizard-footer">
                    <div class="pull-right">
                        <button class='btn btn-next btn-fill btn-primary btn-wd'> Seterusnya</button>

                        <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                    </div>

                    <div class="pull-left">
                        <input onclick="goBack()" type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>


@endsection
