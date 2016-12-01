@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-profile">
                    <div class="card-header card-background card-background-main">
                        <img src="img/logo/logo 2-02.png" style="max-height:100px; width:100%; max-width:400px; " alt="Norway">
                    </div>
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="/img/avatar/boy-512-03.png" style="background-color:white;">
                        </a>
                    </div>

                    <div class="content">
                        <h6 class="category text-gray">CEO / Co-Founder</h6>
                        <h4 class="card-title">Alec Thompson</h4>
                        <p class="card-content">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 hidden-xs ">
                <div class="card ">
                    <div class="card-header " data-background-color="red">
                        <h4 class="title">News from eduhub.my </h4>
                    </div>


                    <div class="card-content">


                        <iframe src="https://eduhub.my/articles/" width="100%" height="500px"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card card-profile">
                    <div class="card-header card-background card-background-sub">
                        <img src="img/logo/logo 2-02.png" style="max-height:200px; width:100%; max-width:700px; " alt="Norway">
                    </div>



                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                    <h4 class="card-title">Alec Thompson</h4>
                    <p class="card-content">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>

                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header card-background card-background-sub-table" >
                        <h2 class="title"><b>School Ranking</b></h2>
                        <p class="category">Here is a subtitle for this table</p>
                    </div>
                    <div class="card-content table-responsive table-full-width">
                        <table class="table">
                            <thead class="text-danger">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-primary">$38,735</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table">
                            <thead class="text-danger">
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Salary</th>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-primary">$38,735</td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td class="text-primary">$63,542</td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td class="text-primary">$78,615</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
