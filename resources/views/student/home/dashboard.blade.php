@extends('student.layout.app') @section('title', 'Dashboard') @section('content')


<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#pablo">
					<img class="img" src="../assets/img/faces/marc.jpg" />
				</a>
			</div>

			<div class="content">
				<!-- <h6 class="category text-gray">CEO / Co-Founder</h6> -->
				<h4 class="card-title">{{Auth::user()->name}}</h4>
				<p class="card-content">
					Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
				</p>
				<a href="#pablo" class="btn btn-primary btn-round">Follow</a>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4 col-sm-12">
		<div class="card">
			<div class="card-content">
					<div style="text-align:center;"><canvas id='graph'></canvas></div>
			</div>
			<div class="card-content table-responsive">
				<table class="table">
					<thead class="text-primary">
						<tr>
							<th>Your score</th>
							<th>Type of person</th>
						</tr>
					</thead>

				</table>

			</div>
			<div class="card-footer">
					<h5 class="footer">R = Realistic, A = Artistic, I = Investigative, E = Enterprising, S = Social, C = Conventional</h5>
			</div>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-4">
		<div class="card">

			<div class="card-content">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="http://cdn3-www.dogtime.com/assets/uploads/gallery/30-impossibly-cute-puppies/impossibly-cute-puppy-15.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://cdn3-www.dogtime.com/assets/uploads/gallery/30-impossibly-cute-puppies/impossibly-cute-puppy-15.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://cdn3-www.dogtime.com/assets/uploads/gallery/30-impossibly-cute-puppies/impossibly-cute-puppy-15.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://cdn3-www.dogtime.com/assets/uploads/gallery/30-impossibly-cute-puppies/impossibly-cute-puppy-15.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
			</div>

		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header card-chart" data-background-color="orange">
				<div class="ct-chart" id="dailySalesChart"></div>
			</div>
			<div class="card-content">
				<h4 class="title">Daily Sales</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header card-chart" data-background-color="orange">
				<div class="ct-chart" id="dailySalesChart"></div>
			</div>
			<div class="card-content">
				<h4 class="title">Daily Sales</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
