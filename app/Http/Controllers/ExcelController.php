<?php

namespace App\Http\Controllers;

use App\Models\Nec;
use App\Models\StudyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
//        $users = StudyLevel::select('name')->get();
//        Excel::create('users', function($excel) use($users) {
//            $excel->sheet('Sheet 1', function($sheet) use($users) {
//                $sheet->fromArray($users);
//            });
//        })->export('xls');

        return view('client.course.excel');

    }

    public function store()
    {
        $file = Input::file('excel');

        Excel::load($file, function($reader) {

            // Getting all results
            $results = $reader->get();

            // ->all() is a wrapper for ->get() and will work the same
            $results = $reader->all();

            return $results;

        });
    }
}
