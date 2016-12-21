@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Ujian Personaliti</h4>
				<p class="category" style="color:white;">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda
					sebanyak mana kotak yang
					anda suka. </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('School\PublicPersonalityController@set3') }}">
					<div class="checkbox">
						<label>
				<input type="checkbox" name="a2" value="1">Pertukangan kayu </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="b3" value="1">Menghias rumah atau pejabat</br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="c4" value="1">Memulakan kelab </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="d5" value="1">Mencari penyelesaian kepada masalah alam sekitar </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="e6" value="1">Menjadi sukarelawan </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="f7" value="1">Menggunakan komputer </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="a8" value="1">Mengendalikan alatan berkuasa tinggi </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="b9" value="1">Menghasilkan video </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="c1" value="1">Memulakan bisnes sendiri </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="d2" value="1">Terlibat dalam projek sains </br>
			</label>
					</div>
					<button class="btn btn-info"> Seterusnya </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection
