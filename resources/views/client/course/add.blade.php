@extends('client.layout.headerLayout') @section('title', 'Course') @section('headbar', 'Add new course') @section('content2')

    <style>
        .col-md-2 {
            text-align: right;
        }

        .row {
            padding-top: 25px;
        }

        select {
            width: 100%;
            box-sizing: border-box;
        }

        .required {
            color: red;
        }
    </style>

    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    The field name with <span class="required">*</span> symbol are compulsary
                </div>
            </div>
            @if($faculties->isEmpty())
                There is no any faculties available. Please add new faculties.
            @else
                <form class="" action="{{route('client.course.store')}}" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-md-2">
                            Course Name
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name_eng" placeholder="English Name" value="{{ old('name_eng') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name_ms" placeholder="Malay Name" value="{{ old('name_ms') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Faculty
                        </div>
                        <div class="col-md-10">
                            {{ Form::select('faculty', $faculties,null,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Field
                        </div>
                        <div class="col-md-10">
                            {{ Form::select('nec', $nec,null,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Level
                        </div>
                        <div class="col-md-10">
                            {{ Form::select('level', $levels,null,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Mode
                        </div>
                        <div class="col-md-10">
                            {{ Form::select('mode', $modes,null,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Period Min
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="period_value_min" placeholder="Min credit hour">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Period Max
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="period_value_max" placeholder="Max credit hour">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Credit Hour
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="credit_hours"
                                   placeholder="Credit hour needed to pass this course">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Duration
                        </div>
                        <div class="col-md-10">
                            {{ Form::select('period_type', $period_type,null,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Qualification Entry
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="qualification" placeholder="Min qualification">
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-2">
                                SPM Qualification Entry
                                <a href="#" data-toggle="tooltip"
                                   title="SPM qualification entry is used for suggesting courses to students after they enter their SPM results,
                        if the field is not filled the course will not be suggested to the students">
                                    <span class="glyphicon glyphicon-info-sign"></span>
                                </a>
                            </div>
                            <div class="col-md-10">
                                <a class="btn btn-success" onclick="addRow()">Add subject</a>
                                <a class="btn btn-danger" onclick="delRow()">Remove subject</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <table id="spmTable">

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Approved
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="approved" placeholder="Approved">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Accredited
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="accredited" placeholder="Accredited">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Commencement
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="commencement" placeholder="Commencement">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            MQA Reference No
                            <span class="required">*</span>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="mqa" placeholder="MQA Reference No">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h3>Course Fee</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Alumni Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="alumni" placeholder="Alumni Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Co-curriculum Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="coq" placeholder="Cocuriculum Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Residential College Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="residential" placeholder="Residential College Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Service Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="service" placeholder="Service Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Tuition Fee
                        </div>
                        <div class="col-md-10">
                            <input type="number" name="tuition" placeholder="Tuition Fee">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h3>Course Type</h3>
                            <h4>*For student recomendation</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Type of person
                        </div>
                        <div class="col-md-10">
                            {{ Form::select('personality_type_id', $personality_type, null, ['class' => 'my_class form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Person Description
                        </div>
                        <div class="col-md-6" id='description'>

                        </div>
                    </div>
                    <div class="row">
                        {{ csrf_field() }}
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2">
                            <a href="{!! route('client.course.view') !!}" class="btn btn-warning">Cancel</a>
                            <button type='submit' class='btn btn-success '>Submit</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $descriptions = [];

        @foreach($personality_description as $pd)
            $descriptions.push('{{$pd}}');
                @endforeach

        var table = document.getElementById("spmTable");

        function addRow() {
            var rowCount = $('#spmTable tr').length;
            if (rowCount <= 10) {
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.innerHTML = '{!! Form::select("name[]", $spm_subjects, null,["placeholder"=>"Select a subject","class"=>"form-control"]) !!}';
                cell2.innerHTML = '{!! Form::select("grade[]",$grades, null, ["placeholder"=>"Select a grade","class"=>"form-control"]) !!}';
            } else {
                alert('SPM have maximum subject of 10');
            }
        }

        function delRow() {
            table.deleteRow(0);
        }

        $('.my_class').change(function () {
            $val = $('.my_class').val() - 1;

            $('#description').text($descriptions[$val]);
        }).change();
    </script>

@endsection