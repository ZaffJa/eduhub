@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="green">
				<h4 class="title">Ujian Personaliti</h4>
				<p class="category" style="color:white;">Arahan: Tandakan kotak yang anda suka. Anda boleh tanda
					sebanyak mana kotak yang
					anda suka. </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('School\PublicPersonalityController@set4') }}">
					<div class="checkbox"><label>
					<input type="checkbox" name="b1" value="1">Menyanyi di khalayak ramai </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="c2" value="1">Memberi ucapan </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="d3" value="1">Mengkaji anatomi manusia</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e4" value="1">Menemu bual klien </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="f5" value="1">Peka dengan persekitaran </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="a5" value="1">Menahan pelanggar undang-undang </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="b6" value="1">Menghasilkan poster </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="c7" value="1">Mengetuai perjumpaan </label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="d8" value="1">Menyelesaikan masalah matematik</label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e9" value="1">Mengajar remaja atau dewasa</label></div>


					<button class="btn btn-info"> Seterusnya </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection
