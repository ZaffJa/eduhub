@extends('client.layout.headerLayout')

@section('title', 'Faculty')
@section('headbar', 'Add Faculty')
@section('content2')


<div class="col-lg-12">

@if (session('status'))

   <div class="box with-border">
    <label>
        {{session('status')}}
    </label>
  </div>
@endif




    <div class='row'>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="box box-primary"> @if (session('status'))
         <label> {{session('status')}} </label>
        </div> @endif
        <form role="form" method="POST" action="{{route('client.add.faculty')}}" enctype="multipart/form-data"
          <div class="box-body">
            <div class="form-group">

               <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
            <div class="form-group">
              <label>Faculty Name</label>
              <input type="text" id="fac_name" name="fac_name" placeholder="Faculty Name">
            </div>
            <div class="form-group"> <label for="exampleInputFile">Image</label> <input type="file" id="exampleInputFile" name="fac_file">
                <p class="help-block">Example block-level help text here.</p>
            </div>
          </div>
          <div class="box-footer"> <a href="{{action('FacultyController@view')}}" class="btn btn-danger">Cancel</a> <button class="btn btn-primary">Submit</button></div>
    </form>
  </div>

</div>

@endsection
