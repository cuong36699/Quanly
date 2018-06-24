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
// 
Route::group(['middleware' => 'locale'], function() {
	Route::get('change-language/{language}', 'StudentController@changeLanguage')
	->name('user.change-language');
	Route::resource('student', 'StudentController');
// 
	Route::resource('department', 'DepartmentController');
// 
	Route::resource('course', 'CourseController');
// 
	Route::get('violation/create/{id}', 'ViolationController@createid');
	Route::resource('violation', 'ViolationController');
// 
	Route::post('/showCourseInDepartment', 'StudentController@showCourseInDepartment');
});
