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

/*Route::match(['get', 'post'], '/', function () */

Auth::routes();

Route::get('/izvjestaj', 'UserController@izvjestaj');

Route::match(['get','post'],'/ispisi/{id}/{sid}','UserController@ispisi')->name('predmet.ispisi');

Route::match(['get','post'],'/passed/{id}','UserController@passed')->name('predmet.passed')->middleware('auth');

Route::get('/remove/{id}','UserController@remove');

Route::get('/profile','UserController@getProfile');

Route::match(['get','post'],'/predmeti/upisi/{id}','SubjectController@upisi')->name('predmet.upisi')->middleware('auth');

Route::match(['get','post'],'/predmeti/edit/{id}','SubjectController@edit')->name('predmet.edit')->middleware('auth');

Route::get('/predmeti/edit/{id}','SubjectController@getEdit');

Route::get('studenti/{id}','UserController@delete')->name('student.delete');

Route::get('predmeti/delete/{id}','SubjectController@delete')->name('predmet.delete');

Route::match(['get','post'],'/predmeti/novi','SubjectController@create')->name('predmet.create')->middleware('auth');

Route::get('/studenti/novi','UserController@getAddNewStudent')->name('studenti.novi');

Route::get('/predmeti/novi','SubjectController@getAddNewSubject')->name('predmeti.novi');

Route::get('/studenti','UserController@getStudent');

Route::get('/predmeti','SubjectController@getSubject');

Route::get('/', 'HomeController@getIndex');

Route::get('/home', 'UserController@getHome');
