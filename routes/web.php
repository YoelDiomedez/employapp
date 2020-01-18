<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

        // Roles
        Route::resource('roles', 'RoleController');
        
        // Users
        Route::get('users', 'UserController@index')->name('users.index')
                ->middleware('permission:users.index');

        Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
                ->middleware('permission:users.edit');

        Route::put('users/{user}', 'UserController@update')->name('users.update')
                ->middleware('permission:users.edit');

        Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
                ->middleware('permission:users.destroy');

        // Applicants 
        Route::get('about', 'ApplicantController@edit')->name('applicants.edit')
        ->middleware('permission:applicants.edit');

        Route::put('applicants/{applicant_id}', 'ApplicantController@update')->name('applicants.update')
        ->middleware('permission:applicants.edit'); 

        Route::patch('applicants/upload', 'ApplicantController@upload')->name('applicants.upload')
        ->middleware('permission:applicants.edit');

        Route::patch('applicants/change', 'ApplicantController@change')->name('applicants.change')
        ->middleware('permission:applicants.edit');

        Route::delete('applicants/destroy', 'ApplicantController@destroy')->name('applicants.destroy')
        ->middleware('permission:applicants.destroy');

        // Departments
        Route::get('departments', 'DepartmentController@index')->name('departments.index')
        ->middleware('permission:departments.index');

        Route::get('departments/{id}', 'DepartmentController@show')->name('departments.show')
        ->middleware('permission:departments.show');

        // Provinces
        Route::get('provinces/{id}', 'ProvinceController@show')->name('provinces.show')
        ->middleware('permission:provinces.show');

        // Countries
        Route::get('countries', 'CountryController@index')->name('countries.index')
        ->middleware('permission:countries.index');
        
        // Degrees
        Route::get('degrees', 'DegreeController@index')->name('degrees.index')
        ->middleware('permission:degrees.index');

        // Education
        Route::get('education', 'EducationController@index')->name('education.index')
        ->middleware('permission:education.index');

        Route::get('education/create', 'EducationController@create')->name('education.create')
        ->middleware('permission:education.create');

        Route::post('education', 'EducationController@store')->name('education.store')
        ->middleware('permission:education.create');

        Route::get('education/{id}/edit', 'EducationController@edit')->name('education.edit')
        ->middleware('permission:education.edit');

        Route::put('education/{id}', 'EducationController@update')->name('education.update')
        ->middleware('permission:education.edit');

        Route::delete('education/{id}', 'EducationController@destroy')->name('education.destroy')
        ->middleware('permission:education.destroy');

        Route::patch('education/{id}', 'EducationController@delete')->name('applicants.delete')
        ->middleware('permission:education.destroy');

        // Trainings
        Route::get('trainings', 'TrainingController@index')->name('trainings.index')
        ->middleware('permission:trainings.index');

        Route::get('trainings/create', 'TrainingController@create')->name('trainings.create')
        ->middleware('permission:trainings.create');

        Route::post('trainings', 'TrainingController@store')->name('trainings.store')
        ->middleware('permission:trainings.create');

        Route::get('trainings/{id}/edit', 'TrainingController@edit')->name('trainings.edit')
        ->middleware('permission:trainings.edit');

        Route::put('trainings/{id}', 'TrainingController@update')->name('trainings.update')
        ->middleware('permission:trainings.edit');

        Route::delete('trainings/{id}', 'TrainingController@destroy')->name('trainings.destroy')
        ->middleware('permission:trainings.destroy');

        Route::patch('trainings/{id}', 'TrainingController@delete')->name('trainings.delete')
        ->middleware('permission:trainings.destroy');

        // Experiences
        Route::get('experiences', 'ExperienceController@index')->name('experiences.index')
        ->middleware('permission:experiences.index');

        Route::get('experiences/create', 'ExperienceController@create')->name('experiences.create')
        ->middleware('permission:experiences.create');

        Route::post('experiences', 'ExperienceController@store')->name('experiences.store')
        ->middleware('permission:experiences.create');

        Route::get('experiences/{id}/edit', 'ExperienceController@edit')->name('experiences.edit')
        ->middleware('permission:experiences.edit');

        Route::put('experiences/{id}', 'ExperienceController@update')->name('experiences.update')
        ->middleware('permission:experiences.edit');

        Route::delete('experiences/{id}', 'ExperienceController@destroy')->name('experiences.destroy')
        ->middleware('permission:experiences.destroy');

        Route::patch('experiences/{id}', 'ExperienceController@delete')->name('experiences.delete')
        ->middleware('permission:experiences.destroy');

        // Documents 
        Route::get('documents', 'DocumentController@edit')->name('documents.edit')
        ->middleware('permission:documents.edit');

        Route::put('documents/update', 'DocumentController@update')->name('documents.update')
        ->middleware('permission:documents.edit');

        Route::delete('documents/destroy', 'DocumentController@destroy')->name('documents.destroy')
        ->middleware('permission:documents.destroy');

        // Announcements
        Route::get('announcements', 'AnnouncementController@index')->name('announcements.index')
        ->middleware('permission:announcements.index');

        Route::get('announcements/create', 'AnnouncementController@create')->name('announcements.create')
        ->middleware('permission:announcements.create');

        Route::post('announcements', 'AnnouncementController@store')->name('announcements.store')
        ->middleware('permission:announcements.create');

        Route::get('announcements/{announcement}/edit', 'AnnouncementController@edit')->name('announcements.edit')
        ->middleware('permission:announcements.edit');

        Route::put('announcements/{announcement}', 'AnnouncementController@update')->name('announcements.update')
        ->middleware('permission:announcements.edit');

        Route::delete('announcements/{announcement}', 'AnnouncementController@destroy')->name('announcements.destroy')
        ->middleware('permission:announcements.destroy');

        Route::patch('announcements/{announcement}', 'AnnouncementController@delete')->name('announcements.delete')
        ->middleware('permission:announcements.destroy');

        Route::get('announcements/{announcement}', 'AnnouncementController@show')->name('announcements.show')
        ->middleware('permission:announcements.select');

        Route::post('announcements/{announcement}/select', 'AnnouncementController@select')->name('announcements.select')
        ->middleware('permission:announcements.select');

        Route::post('announcements/{announcement}/apply', 'AnnouncementController@apply')->name('announcements.apply')
        ->middleware('permission:announcements.apply');

        // Records
        Route::get('curriculum', 'RecordController@index')->name('records.index')
        ->middleware('permission:records.index');

        Route::get('applications', 'RecordController@see')->name('records.see')
        ->middleware('permission:records.index');

        Route::get('curriculum/{id}', 'RecordController@show')->name('records.show')
        ->middleware('permission:records.show');

        // Business
        Route::get('business', 'CompanyController@index')->name('business.index')
        ->middleware('permission:business.index');

        Route::get('business/create', 'CompanyController@create')->name('business.create')
        ->middleware('permission:business.create');

        Route::post('business', 'CompanyController@store')->name('business.store')
        ->middleware('permission:business.create');

        Route::get('info', 'CompanyController@edit')->name('business.edit')
        ->middleware('permission:business.edit');

        Route::put('business/{company_id}', 'CompanyController@update')->name('business.update')
        ->middleware('permission:business.edit');

        Route::delete('business/{company}', 'CompanyController@destroy')->name('business.destroy')
        ->middleware('permission:business.destroy');
});