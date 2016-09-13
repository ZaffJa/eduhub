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

Route::get('/course','CourseController@view')->name('client.course.view');
Route::get('/course/add','CourseController@add')->name('client.course.add');
Route::post('/course/add','CourseController@store')->name('client.course.store');
Route::get('/course/{id}/edit', 'CourseController@edit')->name('client.course.edit');
Route::post('/course/{id}/edit', 'CourseController@update')->name('client.course.update');
Route::post('/course/{id}/delete', 'CourseController@delete')->name('client.course.delete');

Route::get('/editProfile', 'DashboardController@profile');
Route::get('/dataTables',function(){
    return Datatables::eloquent(User::query())->make(true);
})->name('dataTables');


Route::group(['prefix'=>'client-dashboard'],function(){
  Route::group(['middleware'=>'auth'],function(){
    Route::get('/', 'DashboardController@dashboard');

Route::group(['middleware' => ['auth'],'prefix' => 'client-dashboard'],function(){

    Route::get('/edit-profile', 'DashboardController@profile');
    Route::get('/', 'DashboardController@dashboard')->name('client.dashboard');
    Route::get('/new-institution', 'InstitutionController@index');
    Route::post('/new-institution', 'InstitutionController@create')->name('client.post.institution');
    Route::get('new-course','CourseNameController@getDetails')->name('client.get.course.details');
    Route::post('post-new-course','CourseNameController@postCreateDetails')->name('client.post.course.detail');
    Route::get('get-courses','DashboardController@getCourses')->name('client.get.courses');
    Route::get('/scholarship/add', 'ScholarshipController@add');
    Route::post('/scholarship/add', 'ScholarshipController@postAdd')->name('add.scholarship');
    Route::get('/faculty/add', 'FacultyController@add')->name('client.faculty.add');
    Route::post('/faculty/add', 'FacultyController@store')->name('client.faculty.store');
    Route::get('/faculty', 'FacultyController@view')->name('client.faculty.view');
    Route::get('/faculty/{id}/edit', 'FacultyController@edit');
    Route::post('/faculty/{id}/edit', 'FacultyController@update')->name('fac_name');
    Route::post('/faculty/{id}/delete', 'FacultyController@delete');
    Route::get('/facilities', 'FacilityController@viewType')->name('faci.viewType');
    Route::get('/facilities/add-all-type', 'FacilityController@addAllType')->name('faci.addAllType');
    Route::post('/facilities/add-all-type/store-all', 'FacilityController@storeAllType')->name('faci.storeAll');
    Route::get('/facilities/{id}', 'FacilityController@view')->name('faci.view');
    Route::get('/facilities/{id}/add', 'FacilityController@add')->name('faci.add');
    Route::post('/facilities/{id}/add', 'FacilityController@store')->name('faci.store');
    Route::get('/facilities/{id}/{fid}/edit', 'FacilityController@edit')->name('faci.edit');
    Route::post('/facilities/{id}/{fid}/edit', 'FacilityController@update')->name('faci.update');
    Route::post('/facilities/{id}/{fid}/delete', 'FacilityController@delete')->name('faci.delete');
  });

  });
});
});
