<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student\PersonalityResult;
use App\Models\PersonalityType;
use App\Models\Course;
use View;


class PersonalityController extends Controller
{

  public function view()
  {
  	return View::make('student.personality.view');
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

  	return View::make('student.personality.set1');
  }

  public function set2(Request $r)
  {
    //Checking if set1 data is already processed
    //If user hit refresh, the data wont be processed the second time
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
    }
    //Set session set1 to mark that set1 data is already process
    session(['set1' => 1]);
    //Set1 that is used for checking if set1 data is processed
    //If user pressed back, delete session set1
    session()->forget('set2');

    return View::make('student.personality.set2');
  }

  public function set3 (Request $r)
  {
    if(!session()->exists('set2'))
    {
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
    }
    session(['set2' => 1]);
    session()->forget('set3');

    return View::make('student.personality.set3');
  }

  public function set4 (Request $r)
  {
    if(!session()->exists('set3'))
    {
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
    }
    session(['set3' => 1]);
    session()->forget('set4');

    return View::make('student.personality.set4');
  }

  public function set5 (Request $r)
  {
    if(!session()->exists('set4'))
    {
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
    }
    session(['set4' => 1]);
    session()->forget('set5');

    return View::make('student.personality.set5');
  }

  public function set6 (Request $r)
  {
    if(!session()->exists('set5'))
    {
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
    }
    session(['set5' => 1]);
    session()->forget('set6');

    return View::make('student.personality.set6');
  }

    public function result(Request $r)
  {

    if(!session()->exists('set6'))
    {
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

    session(['set6' => 1]);



    //Storing result into array to sort using algorithm
    $res = array
    (
    array('Realistic',session('r')),
    array('Artistic',session('a')),
    array('Investigative',session('i')),
    array('Enterprising',session('e')),
    array('Social',session('s')),
    array('Conventional',session('c'))
    );
    //Sorting result
    $res = $this->sort($res);

    if(!PersonalityResult::whereUserId(9)->first())
    {
      PersonalityResult::create([
            'user_id'=>9,
            'realistic'=>session('r'),
            'artistic'=>session('a'),
            'investigative'=>session('i'),
            'enterprising'=>session('e'),
            'social'=>session('s'),
            'conventional'=>session('c')
        ]);
    }
    else
    {
      try{
      $personality = PersonalityResult::whereUserId(9)->firstOrFail();

      $personality->realistic = session('r');
      $personality->artistic = session('a');
      $personality->investigative = session('i');
      $personality->enterprising = session('e');
      $personality->social = session('s');
      $personality->conventional = session('c');

      $personality->save();

      }catch(\Illuminate\Database\QueryException $ex){
                return redirect()
                            ->back()
                            ->withErrors($ex->errorInfo[2])
                            ->withInput();
        }
    }

    return $res;

    $personalityType = PersonalityType::all();

    return View::make('student.personality.result',compact('res','personalityType'));
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
          $swapped = true;
        }
      }
      $n -= 1;
    }while($swapped != false);

    return $res;
  }

}
