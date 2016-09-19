@extends('client.layout.headerLayout')

@section('title', 'Profile')
@section('headbar', 'Institution Profile Edit')
@section('content2')


          <div class="col-lg-12">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit University Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Telephone</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Telephone">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fax</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Fax">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">University logo</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">File only accept jpg and png file format</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                  <a class="btn btn-warning" href="/client-dashboard">Cancel</a>
                <button type="submit" class="btn btn-success">Submit</button>

              </div>
            </div>
            </form>
          </div>


@endsection
