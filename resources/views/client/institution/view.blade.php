@extends('client.layout.headerLayout')

@section('title', 'Institution')
@section('headbar', 'Institution list')
@section('content2')


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Institutions</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-striped">
                <tbody>
                  <tr>
                  <th>NO</th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Website</th>

                </tr>
                <tr>
                  <td>1</td>
                  <td>University Technology, of Malaysia</td>
                  <td>Skudai, Johor</td>
                  <td><span class="label label-success">www.utm.my</span></td>

                </tr>

              <tr>
                <td>1</td>
                <td>University Technology, of Malaysia</td>
                <td>Kuala Lumpur</td>
                <td><span class="label label-success">www.utm.my</span></td>

              </tr>

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>



@endsection
