@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Ujian Personaliti</h4>
                    <p class="category" style="color:white;">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda
                        sebanyak mana kotak yang
                        anda suka. </p>
                </div>
                <div class="card-content">
                    <form method="get" action="{{ action('School\PublicPersonalityController@result') }}"
                          id="form_data">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="c6" value="1">Menjual barang</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="b7" value="1">Menghasilkan arca</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="f1" value="1">Meyimpan laporan dengan teliti</label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="f8" value="1">Mengesahkan dokumen</label>
                        </div>

                        <input type="hidden" name="email" id="email">
                        <input class="btn btn-success" type="submit" value="Hantar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        h4 {
            font-size: large;
            font-weight: bold;
        }
    </style>
    <script>
        $(function () {
            $("input[type=submit]").on("click", function (e) {
                e.preventDefault();
                var _this = this;
                bootbox.prompt({
                    title: "Sila masukkan email anda untuk mendapatkan keputusan ujian personaliti!",
                    inputType: 'email',
                    callback: function (result) {
                        $('#email').val($('.bootbox-input-email').val())
                        $(_this).parent().submit();

                    }
                });
            });
        });
    </script>
@endsection
