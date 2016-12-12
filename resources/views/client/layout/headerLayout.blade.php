@extends('client.layout.app') @section('content')
    <div class="row">
        <!-- <div class="col-lg-1">
        <a href="#" style="color:black;font-size: 200%"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
      </div> -->

        <!--  <div class="col-lg-10">-->
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header" style="background-color: #DD4B39">
                        <div class="box-title" style="font-size:300%;color: white"><strong>@yield('headbar')</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class='row'>
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <script>
                                $.notify({
                                    // options
                                    message: "{{ $error }}"
                                }, {
                                    // settings
                                    type: 'warning'
                                });
                            </script>
                        @endforeach
                    @endif
                    @if (session('status'))
                        <script>
                            $.notify({
                                // options
                                message: "{{ session('status') }}"
                            }, {
                                // settings
                                type: 'success'
                            });
                        </script>

                    @endif
                </div>
                @yield('content2')
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="confirmDelete">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="" role="button" id="parseDeleteRoute" class="btn btn-danger">Delete</a>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <script type="text/javascript">
            $('.confirmDeleteBtn').on('click', function () {
                $('#parseDeleteRoute').attr('href', $(this).val());
                $('#confirmDelete').modal();
            });
        </script>
    </div>
    <!--</div>-->

@endsection
