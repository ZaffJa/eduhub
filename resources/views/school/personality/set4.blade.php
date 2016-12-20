@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Ujian Personaliti</h4>
                    <p class="category" style="color:white;">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda
                        sebanyak mana kotak yang
                        anda suka. </p>
                </div>
                <div class="card-content">
                    <form method="get" action="{{ action('School\PublicPersonalityController@set5') }}">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="a6" value="1">Menanam pokok </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="d7" value="1">Mengkaji sistem solar </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="e3" value="1">Menolong orang yang dalam kesedihan </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="f2" value="1">Mengendali mesin untuk bisnes </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="c8" value="1">Mengetuai projek </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="a9" value="1">Memandu trak </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="d6" value="1">Mengumpul batu dan mineral </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="e8" value="1">Membuat orang ketawa </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="b4" value="1">Berlakon </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="f4" value="1">Menerima mesej telefon </br>
                            </label>
                        </div>

                        <button class="btn btn-info"> Seterusnya</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
