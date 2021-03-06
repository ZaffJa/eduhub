@extends('short.layout.app') @section('content')
<div class="row">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header" style="background-color: #008D4C">
                    <h3 class="box-title" style="font-size:300%;color: white"> @yield('headbar') </h3>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class='row'>
                @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><strong>X</strong></button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4> {{ session('status') }}
                </div>
                @endif
            </div>
            @yield('content2')
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="confirmDelete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
        $('.confirmDeleteBtn').on('click', function() {
            $('#parseDeleteRoute').attr('href', $(this).val());
            $('#confirmDelete').modal();
        });
    </script>
</div>
<!--</div>-->

@endsection
