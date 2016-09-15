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
                  <th>Parent Institution</th>
                  <th>Location</th>
                  <th>Website</th>
                  <th>View</th>
                </tr>

                @foreach ($institutions as $index=>$institution)

                <tr>
                  <td> {{ $index + 1 }} </td>
                  <td> {{ $institution->name }} </td>
                  <td> {{ $institution->parent ? $institution->parent->name : 'Parent institution not added'}} </td>
                  <td> {{ $institution->location }} </td>
                  <td>
                    <a href="{{ $institution->website }}"> 
                        {{ $institution->website}} 
                    </a> 
                  </td>
                  <td>
                    <a href="{!! route('client.institution.view.institution', $institution->id, $institution->slug) !!}" class="btn btn-info-outline">
                      View
                    </a>
                  </td>
                </tr>

                @endforeach
              </tbody>

              {{ $institution->render }}

            </table>
            </div>
            <!-- /.box-body -->
          </div>



@endsection
