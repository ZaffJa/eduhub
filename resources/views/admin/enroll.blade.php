@extends('admin.layout.app') @section('title', 'All Enrollment')

@section('headbar', 'All Enrollment') @section('content')


        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Institution Name</th>
                                <th>Action</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>UTM</td>
                                    <td>MOHD Kentang</td>
                                    <td>asd@asd.com</td>
                                    <td></td>
                                    <td>
                                        <a class='btn btn-sm btn-primary' >View</a>
                                        <a class='btn btn-sm btn-danger' href="">Delete</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
   @endsection
