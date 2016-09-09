@extends('client.layout.headerLayout')

@section('title', 'Faculty')
@section('headbar', 'Faculty Form')
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
            <form action="{{route('fac.name.store')}}" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>Faculty Name</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <input type="text" id="fac_name" name="fac_name" placeholder="Faculty Name">
                  
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <a href="{{action('FacultyController@view')}}" class="btn btn-danger">Cancel</a>
               <button class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>


</div>
@endsection
