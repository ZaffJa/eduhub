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
                    <form method="get" action="{{ action('School\PublicPersonalityController@result') }}" id="form_data">
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
                        <button class="btn btn-success" id="submit" type="submit"> Hantar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
//            $('form').submit(function (e) {
//
//                e.preventDefault();
//
//                bootbox.prompt({
//                    title: "This is a prompt with an email input!",
//                    inputType: 'email',
//                    callback: function (result) {
//
//                            $('#email').val($('.bootbox-input-email').val())
//                            console.log($('#email').val());
//
//                        $(this).unbind(e);
//
//                        $('#form_data').trigger('submit');
//                    }
//                });
//
//
//
//
//            });
        });
    </script>

@endsection
