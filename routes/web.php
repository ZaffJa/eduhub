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



Route::group(['prefix'=>'client-dashboard'],function(){
  Route::group(['middleware'=>'auth'],function(){

    Route::get('/', 'DashboardController@dashboard')->name('client.dashboard');
    Route::get('/edit-profile', 'DashboardController@profile')->name('client.profile');
    Route::get('/request-institution','InstitutionController@requestInstitution')->name('client.request.institution');
    Route::post('/request-institution','InstitutionController@requestAddInstitution')->name('client.request.add.institution');


    Route::get('/all-institution','InstitutionController@viewAllInstitution')->name('admin.view.all.institution');
    Route::get('/edit-institution/{id}','InstitutionController@editInstitution')->name('admin.edit.institution');
    Route::get('/view-institution-request','InstitutionController@viewInstitutionRequest')->name('admin.view.institution.request');
    Route::get('/approve-institution/{id}','InstitutionController@approveInstitutionRequest')->name('admin.approve.institution.request');
    Route::get('/reject-institution/{id}','InstitutionController@rejectInstitutionRequest')->name('admin.reject.institution.request');

    Route::get('/new-institution', 'InstitutionController@index');
    Route::post('/new-institution', 'InstitutionController@create')->name('client.post.institution');


    Route::get('/course','CourseController@view')->name('client.course.view');
    Route::get('/course/{id}/course-view','CourseController@viewCourse')->name('client.course.view.course');
    Route::get('/course/add','CourseController@add')->name('client.course.add');
    Route::post('/course/add','CourseController@store')->name('client.course.store');
    Route::get('/course/{id}/edit', 'CourseController@edit')->name('client.course.edit');
    Route::post('/course/{id}/edit', 'CourseController@update')->name('client.course.update');
    Route::get('/course/{id}/delete', 'CourseController@delete')->name('client.course.delete');

    Route::get('/scholarship/add', 'ScholarshipController@add')->name('client.view.add.scholarship');
    Route::post('/scholarship/add', 'ScholarshipController@postAdd')->name('client.add.scholarship');
    Route::get('/scholarship/view', 'ScholarshipController@view')->name('client.view.scholarship');
    Route::get('/scholarship/delete/{id}', 'ScholarshipController@delete')->name('client.delete.scholarship');

    Route::get('/faculty', 'FacultyController@view')->name('client.faculty.view');
    Route::get('/faculty/add', 'FacultyController@add')->name('client.faculty.add');
    Route::post('/faculty/add', 'FacultyController@store')->name('client.faculty.store');
    Route::get('/faculty/{id}/edit', 'FacultyController@edit')->name('client.faculty.edit');
    Route::post('/faculty/{id}/edit', 'FacultyController@update')->name('fac_name');
    Route::get('/faculty/{id}/delete', 'FacultyController@delete')->name('client.faculty.delete');
    Route::get('/faculty/search', 'FacultyController@postSearchFaculty')->name('client.faculty.search');
    Route::post('/faculty/search-result', 'FacultyController@postSearchResult')->name('client.faculty.search.result');


    Route::get('/facilities', 'FacilityController@viewType')->name('faci.viewType');
    Route::get('/facilities/add-all-type', 'FacilityController@addAllType')->name('faci.addAllType');
    Route::post('/facilities/add-all-type/store-all', 'FacilityController@storeAllType')->name('faci.storeAll');
    Route::get('/facilities/{id}', 'FacilityController@view')->name('faci.view');
    Route::get('/facilities/{id}/add', 'FacilityController@add')->name('faci.add');
    Route::post('/facilities/{id}/add', 'FacilityController@store')->name('faci.store');
    Route::get('/facilities/{id}/{fid}/edit', 'FacilityController@edit')->name('faci.edit');
    Route::post('/facilities/{id}/{fid}/edit', 'FacilityController@update')->name('faci.update');
    Route::post('/facilities/{id}/{fid}/delete', 'FacilityController@delete')->name('faci.delete');

    Route::get('/institution','InstitutionController@view')->name('client.institution.view');
    Route::get('/institution/{slug}/institution-view', 'InstitutionController@viewInstitution')->name('client.institution.view.institution');
  });
});
