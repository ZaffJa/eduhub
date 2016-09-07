<?php
use Yajra\Datatables\Facades\Datatables;
use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@dashboard');

Route::get('/dataTables',function(){
  return Datatables::eloquent(User::query())->make(true);
})->name('dataTables');
