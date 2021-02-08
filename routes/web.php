<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guestuser');
Route::name('home')->get('/home', function () {
    return view('welcome');
})->middleware('guestuser');

Route::name('about')->get('/about', function() {
    return view('pages.about.about');
});

Route::name('login_student')->get('/login_student', 'InscritsController@indexLoginStudent')->middleware('guestuser');

Route::post('/login_student', 'InscritsController@login');

Route::get('/student_world', 'InscritsController@indexStudentWorld')->middleware('login');

Route::get('/login_admin', 'AdminsController@indexLoginAdmin')->middleware('guestuser');

Route::post('/login_admin', 'AdminsController@login');

Route::get('/admin_world', 'AdminsController@index')->middleware('login');

Route::post('/admin_world', 'AdminsController@exitAdminWorld');

Route::name('register_list_notes')->get('/register_list_notes', 'InscritsController@show')->middleware('login');

Route::post('/register_list_notes','InscritsController@searchByIne');

Route::post('/student_world', 'InscritsController@exitStudentWorld');

Route::name('claims_student')->get('/claims_student', 'ReclamationsController@index')->middleware('login');

Route::post('claims_student.showByIne', 'ReclamationsController@showByIne')->name('claims_student');

Route::resource('claims_student', 'ReclamationsController');

Route::delete('claims_student/{$id}', 'ReclamationsController@show');

Route::get('/make_claims', 'ReclamationsController@create')->middleware('login');

Route::post('/make_claims', 'ReclamationsController@store');
