<?php

namespace App\Http\Controllers\School;

use App\Mail\PublicPersonalityTestResult;
use App\Models\School\PublicPersonality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersonalityType;
use App\Models\File;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use View;
use Auth;


class PublicPersonalityController extends Controller
{

    public function view()
    {
        return View::make('school.personality.view');
    }

    public function set1()
    {
        //Initialize session for personality test result
        session(['r' => 0]);
        session(['a' => 0]);
        session(['e' => 0]);
        session(['i' => 0]);
        session(['s' => 0]);
        session(['c' => 0]);
        //Set1 is used for checking if set1 data is processed
        //If user pressed back Delete session set1
        session()->forget('set1');

        return View::make('school.personality.set1');
    }


    public function result(Request $r)
    {

        if(!session()->exists('set1'))
        {
            if($r->a1){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->b2){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->c3){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->d4){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->e5){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->f6){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->a7){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->b8){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->c9){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->d1){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->a2){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->b3){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->c4){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->d5){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->e6){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->f7){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->a8){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->b9){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->c1){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->d2){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->b1){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->c2){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->d3){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->e4){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->f5){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->a5){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->b6){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->c7){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->d8){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->e9){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->a6){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->d7){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->e3){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->f2){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->c8){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->a9){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->d6){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->e8){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->b4){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->f4){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->b5){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->e7){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->f3){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->d9){
                $rea = session('i');
                session(['i' => $rea += 1]);
            }
            if($r->a4){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->e1){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->f9){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->e2){
                $rea = session('s');
                session(['s' => $rea += 1]);
            }
            if($r->a3){
                $rea = session('r');
                session(['r' => $rea += 1]);
            }
            if($r->c5){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->c6){
                $rea = session('e');
                session(['e' => $rea += 1]);
            }
            if($r->b7){
                $rea = session('a');
                session(['a' => $rea += 1]);
            }
            if($r->f1){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
            if($r->f8){
                $rea = session('c');
                session(['c' => $rea += 1]);
            }
        }

        session(['set1' => 1]);

        //Storing result into array to sort using algorithm
        $res = array
        (
            array('Realistik',session('r')),
            array('Artistik',session('a')),
            array('Investigatif',session('i')),
            array('Berdaya usaha',session('e')),
            array('Sosial',session('s')),
            array('Konvensional',session('c'))
        );
        //Sorting result
        $chart = $res;
        $res = $this->sort($res);

        switch ($res[0][0])
        {
            case 'Realistik':
                $id = 1;
                break;

            case 'Artistik':
                $id = 2;
                break;

            case 'Investigatif':
                $id = 3;
                break;

            case 'Berdaya usaha':
                $id = 4;
                break;

            case 'Sosial':
                $id = 5;
                break;

            case 'Konvensional':
                $id = 6;
                break;
        }

        $personalityType = PersonalityType::all();
        $course = Course::wherePersonalityTypeId($id)->orderByRaw("Rand()")->take(5)->get();
        $careerImage = File::wherePersonalityTypeId($id)->get();


        if($r->email != null) {

            PublicPersonality::create([
               'email' => $r->email,
                'personality_type_id' => $id
            ]);


            Mail::to($r->email)->send(new PublicPersonalityTestResult($res,$chart,$personalityType,$course,$careerImage));

            return View::make('school.personality.result',compact('res','chart','personalityType','course','careerImage'))->with('status','Keputusan anda telah di emelkan ke '.$r->email);
        }

        return View::make('school.personality.result',compact('res','chart','personalityType','course','careerImage'));
    }

    public function sort($res)
    {
        $n = count($res);
        do
        {
            $swapped = false;
            for($i = 1; $i < $n ; $i++)
            {
                if($res[$i-1][1] < $res[$i][1])
                {

                    $temp = $res[$i-1][1];
                    $res[$i-1][1] = $res[$i][1];
                    $res[$i][1] = $temp;
                    $temp2 =  $res[$i-1][0];
                    $res[$i-1][0] = $res[$i][0];
                    $res[$i][0] = $temp2;
                    $swapped = true;
                }
            }
            $n -= 1;
        }while($swapped != false);

        return $res;
    }

}
