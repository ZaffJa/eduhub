<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
  public function dashboard()
  {
      return view('client.dashboard');
  }
  public function profile()
  {
      return view('client.edit-profile');
  }
  public function facilities()
  {
      return view('client.facilitiess');
  }
}
