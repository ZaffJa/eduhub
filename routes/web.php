<?php
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
Auth::routes();



Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reg', function () {
    return view('layouts.header');
});

Route::post('institutions/v/{slug}/enquiry/{course}','EnquiryController@store');

Route::get('/agent', 'AgentController@dashboard')->name('agent.dashboard');


Route::group(['prefix'=>'short'],function(){

    Route::get('/activate-account/{token}', 'ShortController@activateAccount');
    Route::get('/resend-activate-account/{token}', 'ShortController@resendActivateAccount');

    Route::get('/register', 'ShortController@getRegister')->name('short.register.view');
    Route::post('/register', 'ShortController@postRegister')->name('short.register');

    Route::get('/login', 'ShortController@getLogin')->name('short.login.view');
    Route::post('/login', 'ShortController@postLogin')->name('short.login');

    Route::group(['middleware'=>['auth','empty.null']],function(){

        Route::get('/', 'ShortController@dashboard')->name('short.dashboard');

        Route::get('/view-profile', 'ShortController@viewProfile')->name('short.profile.view');
        Route::get('/edit-profile', 'ShortController@editprofile')->name('short.profile.edit');
        Route::post('/edit-profile','ShortController@updateProfile')->name('short.profile.update');

        Route::get('/course', 'ShortController@viewCourse')->name('short.course.view');
        Route::get('/course/add', 'ShortController@addCourse')->name('short.course.add');
        Route::post('/course/add', 'ShortController@storeCourse')->name('short.course.store');
        Route::get('/course/{id}/edit', 'ShortController@editCourse')->name('short.course.edit');
        Route::post('/course/{id}/edit', 'ShortController@updateCourse')->name('short.course.update');
        Route::get('/course/{id}/course-view', 'ShortController@viewCourseInfo')->name('short.course.view.info');
        Route::get('/course/delete/{id}', 'ShortController@destroy');

        Route::get('/activate-institution/{user_id}', 'ShortController@activateInstitutionUser');
        Route::get('/institution-short-course', 'ShortController@institutionShortCourse');

    });
});


Route::group(['prefix'=>'client-dashboard'],function(){
  Route::group(['middleware'=>['auth']],function(){

    Route::get('/notifications', 'EnquiryController@getNotifications');
    Route::get('/notifications/view', 'EnquiryController@view');
    Route::post('/notifications/reset', 'EnquiryController@reset');


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
    Route::get('/course/search', 'CourseController@postSearchCourse')->name('client.course.search');
    Route::post('/course/search-result', 'CourseController@postSearchCourseResult')->name('client.course.search.result');

    Route::get('/scholarship/add', 'ScholarshipController@add')->name('client.view.add.scholarship');
    Route::post('/scholarship/add', 'ScholarshipController@postAdd')->name('client.add.scholarship');
    Route::get('/scholarship/view', 'ScholarshipController@view')->name('client.view.scholarship');
    Route::get('/scholarship/delete/{id}', 'ScholarshipController@delete')->name('client.delete.scholarship');
    Route::get('/scholarship/download/{id}', 'ScholarshipController@clientDownload')->name('client.download.scholarship');

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
    Route::get('/facilities/{id}/{fid}/delete', 'FacilityController@delete')->name('faci.delete');

    Route::get('/institution','InstitutionController@view')->name('client.institution.view');
    Route::get('/institution/{id}/institution-view', 'InstitutionController@viewInstitution')->name('client.institution.view.institution');
    Route::get('/institution/{id}/edit', 'InstitutionController@edit')->name('client.institution.edit');
    Route::post('/institution/{id}/edit', 'InstitutionController@update')->name('client.institution.update');

  });
});
