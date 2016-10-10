@extends('short.layout.headerApp')

@section('title', 'Profile')
@section('headbar', 'Your Profile')
@section('content2')
<style media="screen">
    .thumbnail {
        max-width: 40%;
    }

    .italic {
        font-style: italic;
    }

    .small {
        font-size: 0.8em;
    }

    .lightbox {
        /** Default lightbox to hidden */
        display: none;
        /** Position and style */
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100%;
        text-align: center;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.8);
    }

    .lightbox img {
        /** Pad the lightbox image */
        max-width: 90%;
        max-height: 80%;
        margin-top: 10%;
    }

    .lightbox:target {
        /** Remove default browser outline */
        outline: none;
        /** Unhide lightbox **/
        display: block;
    }
</style>
<div>
	<div class="col-lg-12">
		<div class="box box-solid">
			<div class="box-header with-border" style="margin-left: 2%">
				<div class="row">
					<a class="profile-link" href="#">
                        <img class="profile-pic" id="clickImg" src="../img/{{isset($profilePic) ? $profilePic->path : ''}}" onerror="this.onerror=null;this.src='/img/avatar/boy-512-03.png'" />
                    </a>
				</div>
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

<a href="#_" class="lightbox" id="imgBox">
    <img class="imgSrc" src="#">
</a>

<script type="text/javascript">
    $('#clickImg').on('click', function() {
        var $src = $(this).prop('src');

        $('.imgSrc').prop('src',$src);
        $('.lightbox').show();
    });

    $('.imgSrc').on('click',function(){
        $('#imgBox').hide();
    });
</script>
@endsection
