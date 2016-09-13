@extends('client.layout.headerLayout') @section('title', 'Scholarship') @section('headbar', 'Add Scholarship') @section('content2')
<div class=col-lg-12>
    <div class="box box-primary">@if (session('status'))
        <div class="box-header with-border"><label>{{session('status')}}</label></div>@endif
        <form role=form>
            <div class=box-body>
                <div class=form-group>
                    <label>Name</label>
                    <input type="text" name="scholarship_name">
                </div>
                <div class=form-group>
                    <input name=fac_name id=fac_name placeholder=Name>
                </div>
                <div class=form-group>
                    <label>Address</label>
                    <input name=_token type=hidden >
                </div>
                <div class=form-group>
                    <input name=fac_name id=fac_name placeholder=Address>
                </div>
                <div class=form-group>
                    <label>Type</label>
                    <input name=_token type=hidden ></div>
                <div class=form-group>
                    <label>Select</label>
                    <select class="form-control input-lg">
                      <option>option 1<option>option 2<option>option 3<option>option 4<option>option 5
                    </select>
                </div>
                <div class=form-group>
                    <label>Contact</label>
                    <input name=_token type=hidden >
                </div>
                <div class=form-group>
                    <input name=fac_name id=fac_name placeholder=Contact>
                </div>
                <div class=form-group>
                    <label>Website</label>
                    <input name=_token type=hidden >
                </div>
                <div class=form-group>
                    <input name=fac_name id=fac_name placeholder=Website>
                </div>
            </div>
            <div class=box-footer><button class="btn btn-success">Submit</button>
                <a class="btn btn-danger" href="{{action('FacultyController@view')}}">Cancel</a>
            </div>
        </form>
    </div>
</div>@endsection
