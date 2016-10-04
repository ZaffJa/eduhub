@extends('short.layout.headerApp')

@section('title', 'Profile')
@section('headbar', 'Your Profile')
@section('content2')

<div>
	<div class="col-lg-12">
		<div class="box box-solid">
			<div class="box-header with-border" style="margin-left: 2%">
				<i class="fa fa-book"></i>
				<h1 class="box-title"> {{ $provider->name }} </h1>
			</div>

			<div class="box-body" style="margin-left:2%; font-size:125%">
				<dl class="dl-horizontal">
					<dt>Headline</dt>
					<dd> {{$provider->headline != null ? $provider->headline : "Headline not added"}} </dd>
					<hr>
					<dt>Abbreviation</dt>
					<dd> {{$provider->abbreviation != null ? $provider->abbreviation : "Abbretiviation not added"}} </dd>
					<hr>
					<dt>Established</dt>
					<dd> {{$provider->established !=  null ? $provider->established : "Established not added"}} </dd>
					<hr>
					<dt>Location</dt>
					<dd> {{$provider->location != null ? $provider->location : "Location not added"}} </dd>
					<hr>
					<dt>Type</dt>
					<dd> {{$provider->type != null ? $provider->type->name : "Provider type no added"}} </dd>
					<hr>
					<dt>Description</dt>
					<dd> {{$provider->description != null ? $provider->description : "Description not added"}} </dd>
					<hr>
					<dt>Website</dt>
					<dd> {{$provider->website != null ? $provider->website : "Website not added"}} </dd>
					<hr>
					<dt>Facebook</dt>
					<dd> {{$provider->facebook != null ? $provider->facebook : "Facebook not added"}} </dd>
					<hr>
					<dt>Instagram</dt>
					<dd> {{$provider->instagram != null ? $provider->instagram : "Instagram not added"}} </dd>
					<hr>
					<dt>Contact</dt>
					<dd> {{$provider->phone != null ? $provider->phone : "Contact not added"}} </dd>
					<hr>
					<dt>Bank Account</dt>
					<dd> {{$provider->bank_account != null ? $provider->bank_account : "Bank Account not added"}} </dd>
					<hr>
					<dt>Bank Type</dt>
					<dd> {{$provider->bank != null ? $provider->bank->name : "Bank Account not added"}} </dd>
					<hr>
				</dl>
				<a href="{!! route('short.profile.edit') !!}" class="btn btn-md btn-primary">Edit</a>
			</div>
		</div>
	</div>
</div>


@endsection
