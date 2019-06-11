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

Route::get('/', 'PagesController@index')->name('home')->middleware('auth');
Route::post('/send', 'SmsController@send')->middleware('auth');

// routes for contacts
Route::resource('contacts', 'ContactsController');

// routes for groups
Route::resource('groups', 'GroupsController');
Route::get('groups/{id}/members', 'GroupsController@view_members')->middleware('auth');
Route::get('groups/addmember/{id}', 'GroupsController@members')->middleware('auth');
Route::get('groups/{group_id}/{contact_id}', 'GroupsController@remove_member')->middleware('auth');

// other pages
Route::get('questions', 'PagesController@questions')->middleware('auth');
Route::get('responses', 'PagesController@responses')->middleware('auth');
Route::get('pricing', 'PagesController@pricing')->middleware('auth');
Route::get('logs', 'PagesController@logs')->middleware('auth');
Route::get('clear_logs', 'PagesController@clear_logs')->middleware('auth');

// routes for hooks/questions
Route::resource('hooks', 'HooksController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
