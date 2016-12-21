@extends('school.layout.app')

@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Ujian Personaliti</h4>
                    <p class="category" style="color:white;">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda
                        sebanyak mana kotak yang
                        anda suka. </p>
                </div>
                <div class="card-content">
                    <form method="get" action="{{ action('School\PublicPersonalityController@set2') }}">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="a1" value="1">Membaiki kereta </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="b2" value="1">Menghasilkan rekaan pakaian </br>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
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
                        <button class="btn btn-info"> Seterusnya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
