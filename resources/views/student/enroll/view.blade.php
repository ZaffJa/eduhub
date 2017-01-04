@extends('school.layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="card">
                <div class="card-header-pills " style="background-color: red;">
                    <div class="card-title text-center" style="color: white; font-weight: 3px; "><h4>Enroll</h4></div>
                </div>
                <div class="card-content">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-icon" data-background-color="green">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title" style="padding-left: 10vh;">Enrollment Status</h4>

                            <div class="card-content table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr><th>ID</th>
                                        <th>University Name</th>
                                        <th>Course</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Verify</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>University Kuala Lumpur</td>
                                        <td>Electrical Engineering</td>
                                        <td>Bangi</td>
                                        <td><span class="label label-info">Pending</span></td>
                                        <td><a type="button" class="btn btn-round btn-sm" disabled>verify</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Taylor's University</td>
                                        <td>Architecture</td>
                                        <td>Bandar Sunway</td>
                                        <td><span class="label label-warning">Enrolled</span></td>
                                        <td><a type="button" class="btn btn-round btn-sm">verify</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Lim Kok Wing</td>
                                        <td>Multimedia and design</td>
                                        <td>Kuala Lumpur</td>
                                        <td><span class="label label-danger">Rejected</span></td>
                                        <td><a type="button" class="btn btn-round btn-sm" disabled>verify</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>UniTar</td>
                                        <td>Civil Engineering</td>
                                        <td>Kuala Lumpur</td>
                                        <td><span class="label label-success">Accepted</span></td>
                                        <td><a type="button" class="btn btn-round btn-sm" disabled>verify</a></td>
                                    </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">list</i>
                            </div>
                            <h4 class="card-title" style="padding-left: 10vh;">New Enroll To Uni Razak</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="info-text" style="padding-left: 10vh;"> Let's start with the basic details</h5>
                                </div>
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>University Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="Uni Razak" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Course</label><br>
                                        <select name="country" class="form-control">
                                            <option disabled="" selected="">- Course -</option>
                                            <option value="Afghanistan"> Blaa </option>
                                            <option value="Albania"> Blaaaa </option>
                                            <option value="Algeria"> Blaaa </option>
                                            <option value="American Samoa"> Osas </option>
                                            <option value="Andorra"> ASD </option>
                                            <option value="Angola"> asd </option>
                                            <option value="Anguilla"> asd </option>
                                            <option value="Antarctica"> asd </option>
                                            <option value="...">...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>Preferred University Branch</label>
                                        <select class="form-control">
                                            <option disabled="" selected="">- Branch -</option>
                                            <option>JB</option>
                                            <option>Kedah</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-lg-offset-1  text-center">
                                    <label>Enrollment Form</label> <br>
                                    <a href="https://www.sitepoint.com/premium/books/build-mobile-websites-and-apps-for-smart-devices/download/pdf" class="btn btn-danger btn-fill btn-round btn-lg">Download</a>
                                    <br><label>Upload Enrollment Form</label>
                                    <input type="file" id="files" class="btn btn-info btn-fill btn-round custom-file-input hidden">
                                    <br>
                                    <label for="files" class="btn btn-info btn-fill btn-round btn-lg">Upload</label>

                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-success btn-fill btn-round btn-lg" style="float: right">Submit</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
