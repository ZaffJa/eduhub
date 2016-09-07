<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FacultyController extends Controller
{
    public function index(){
    	$faculties = Faculty::();
    	return view('client.new-faculty');
    }
}
