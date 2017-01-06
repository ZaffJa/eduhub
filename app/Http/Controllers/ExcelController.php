<?php

namespace App\Http\Controllers;

use App\Models\Nec;
use App\Models\School\School;
use App\Models\School\SchoolLocation;
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

        echo view('client.course.excel');

    }

    public function store()
    {


        $csv = array_map('str_getcsv', file('SEKOLAH_MENENGAH.csv'));

        // Turn the csv data into objects which can be saved directly
        // into model.
        array_walk($csv, function (&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv);

        //900 seconds = 15 minutes
        // This process will need some time to complete.
        // So we need to set the timeout longer if not it will
        // display execution time reached error.
        ini_set('max_execution_time', 900);

        foreach ($csv as $data) {
            if(!School::where('name',$data['Nama_Sekolah'])->first()) {
                $school = School::create([
                    'type'=>'menengah',
                    'ppd'=>$data['PPD'],
                    'code'=>$data['Kod_Sekolah'],
                    'school_type_id'=>$this->schoolId($data['Nama_Sekolah']),
                    'name'=>$data['Nama_Sekolah'],
                    'slug'=> str_slug($data['Nama_Sekolah']),
                    'address'=>$data['Alamat'],
                    'postcode'=>$data['Poskod'],
                    'city'=>$data['Bandar'],
                    'state'=>$data['Negeri'],
                    'telephone'=>$data['Telefon'],
                    'fax'=>$data['Fax'],
                ]);

//                SchoolLocation::create([
//                    'school_id' => $school->id,
//                    'latitude' => 1.530007,
//                    'longtitude' => 103.765869
//                ]);
            }


        }
        return 'ok';
    }


    public function schoolId($name)
    {

        if (strpos($name, strtoupper('smk')) !== false) {

            $type = 3;
        }
        else if (strpos($name, strtoupper('sma')) !== false) {

            $type = 11;
        }
        else if (strpos($name, strtoupper('maahad')) !== false) {

            $type = 11;
        }
        else if (strpos($name, strtoupper('sm agama')) !== false) {

            $type = 11;
        }
        else if (strpos($name, strtoupper('sabk')) !== false) {

            $type = 11;
        }
        else if (strpos($name, strtoupper('sm')) !== false) {

            $type = 3;
        }
        else if (strpos($name, strtoupper('kolej')) !== false) {

            $type = 4;
        }
        else if (strpos($name, strtoupper('sbp')) !== false) {

            $type = 8;
        }
        else if (strpos($name, strtoupper('sbpi')) !== false) {

            $type = 8;
        }
        else if (strpos($name, strtoupper('sukan')) !== false) {

            $type = 7;
        }
        else if (strpos($name, strtoupper('sekolah menengah kebangsaan')) !== false) {

            $type = 3;
        }
        else if (strpos($name, strtoupper('sekolah menengah kebangsaan agama')) !== false) {

            $type = 11;
        }
        else if (strpos($name, strtoupper('sam')) !== false) {

            $type = 11;
        }
        else  {

            $type = 3;
        }

        return $type;
    }

    public function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
