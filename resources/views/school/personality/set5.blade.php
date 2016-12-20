@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="orange">
				<h4 class="title">Ujian Personaliti</h4>
				<p class="category" style="color:white;">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda
					sebanyak mana kotak yang
					anda suka. </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('School\PublicPersonalityController@set6') }}">
					<div class="checkbox">
						<label>
					<input type="checkbox" name="b5" value="1">Menulis puisi atau cerita</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e7" value="1">Belajar psikologi</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="f3" value="1">Menyusun tempat kerja</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="d9" value="1">Mengkaji haiwan dan tumbuhan</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="a4" value="1">Belajar elektronik</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e1" value="1">Bekerja dengan kanak-kanak</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="f9" value="1">Menghasilkan sistem fail</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e2" value="1">Menjaga orang sakit</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="a3" value="1">Bekerja di lapangan</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="c5" value="1">Menyimpan wang</label></div>


					<button class="btn btn-info"> Seterusnya </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection 
