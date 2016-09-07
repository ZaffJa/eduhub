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

Route::get('/editProfile', 'DashboardController@profile');
Route::get('/dataTables',function(){
    return Datatables::eloquent(User::query())->make(true);
})->name('dataTables');


Route::group(['prefix'=>'client-dashboard'],function(){
  Route::get('new-course','CourseNameController@getDetails')->name('client.get.course.details');
  Route::post('post-new-course','CourseNameController@postCreateDetails')->name('client.post.course.detail');
});

Route::get('/faculty/add', 'FacultyController@add');
Route::post('/faculty/add', 'FacultyController@example')->name('example');
Route::get('/faculty', 'FacultyController@view');
Route::get('/faculty/{id}/edit', 'FacultyController@edit');
Route::post('/faculty/{id}', 'FacultyController@update')->name('fac_name');
