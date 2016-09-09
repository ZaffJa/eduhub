@extends('client.layout.headerLayout')

@section('title', 'Scholarship')
@section('headbar', 'Add Scholarship')
@section('content2')


<div class="col-lg-12">
            <div class="box box-primary">
@if (session('status'))
  
   <div class="box-header with-border">
    <label>
        {{session('status')}}
    </label>
  </div>
@endif

            
              
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <input type="text" id="fac_name" name="fac_name" placeholder="Name">
                  
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <input type="text" id="fac_name" name="fac_name" placeholder="Address">
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <label>Select</label>
                  <select class="form-control input-lg">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Contact</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <input type="text" id="fac_name" name="fac_name" placeholder="Contact">
                  
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <input type="text" id="fac_name" name="fac_name" placeholder="Website">
                  
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              	<button class="btn btn-success">Submit</button>
               <a href="{{action('FacultyController@view')}}" class="btn btn-danger">Cancel</a>
               
              </div>
            </form>
          </div>


</div>

@endsection