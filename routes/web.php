<?php
use Yajra\Datatables\Facades\Datatables;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSend;

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

Route::get('/email',function(){
    Mail::to('zafrizulkipli@gmail.com')->send(new TestSend);
    return 'ok';
})->name('email');




Route::get('/home', 'HomeController@index');

Route::get('/facilities', 'DashboardController@facilities');
Route::get('/editProfile', 'DashboardController@profile');
Route::get('/dataTables',function(){
    return Datatables::eloquent(User::query())->make(true);
})->name('dataTables');



Route::group(['middleware' => ['auth'],'prefix' => 'client-dashboard'],function(){

    Route::get('/edit-profile', 'DashboardController@profile');
    Route::get('/', 'DashboardController@dashboard')->name('client.dashboard');



    Route::get('/new-institution', 'InstitutionController@index');
    Route::post('/new-institution', 'InstitutionController@create')->name('client.post.institution');



    Route::get('new-course','CourseNameController@getDetails')->name('client.get.course.details');
    Route::post('post-new-course','CourseNameController@postCreateDetails')->name('client.post.course.detail');
    Route::get('get-courses','DashboardController@getCourses')->name('client.get.courses');

    Route::get('/scholarship/add', 'ScholarshipController@add');

    Route::get('/faculty/add', 'FacultyController@add');
    Route::post('/faculty/add', 'FacultyController@store')->name('fac.name.store');
    Route::get('/faculty', 'FacultyController@view');
    Route::get('/faculty/{id}/edit', 'FacultyController@edit');
    Route::post('/faculty/{id}/edit', 'FacultyController@update')->name('fac_name');
    Route::post('/faculty/{id}/delete', 'FacultyController@delete');

    Route::get('/facilities', 'FacilityController@viewType');
    Route::get('/facilities/{id}', 'FacilityController@view')->name('faci.view');
    Route::get('/facilities/{id}/add', 'FacilityController@add')->name('faci.add');
    Route::post('/facilities/{id}/add', 'FacilityController@store')->name('faci.store');
    Route::get('/facilities/{id}/{fid}/edit', 'FacilityController@edit')->name('faci.edit');
    Route::post('/facilities/{id}/{fid}/edit', 'FacilityController@update')->name('faci.update');
    Route::post('/facilities/{id}/{fid}/delete', 'FacilityController@delete')->name('faci.delete');


});
