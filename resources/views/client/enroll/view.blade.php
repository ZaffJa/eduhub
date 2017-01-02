@extends('client.layout.app')

@section('title', 'Enrollments')

@section('content')
    <section class="content-header">
        <h1>
            Student Enrollments Tables

        </h1>

    </section>
    <section class="content">
    <div class="col-xs-12">
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>File</th>
                        <th>Status</th>

                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td>11-7-2014</td>
                        <td><select>
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Enrolled">Enrolled</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Accepted">Accepted</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td>11-7-2014</td>
                        <td><select>
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Enrolled">Enrolled</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Accepted">Accepted</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>657</td>
                        <td>Bob Doe</td>
                        <td>11-7-2014</td>
                        <td>11-7-2014</td>
                        <td><select>
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Enrolled">Enrolled</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Accepted">Accepted</option>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>175</td>
                        <td>Mike Doe</td>
                        <td>11-7-2014</td>
                        <td>11-7-2014</td>
                        <td><select>
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Enrolled">Enrolled</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Accepted">Accepted</option>

                            </select>
                        </td>
                    </tr>
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </section>
@endsection
