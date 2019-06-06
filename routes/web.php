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

Route::get('/', 'PagesController@index')->name('home');
Route::post('/send', 'SmsController@send');

// routes for contacts
Route::resource('contacts', 'ContactsController');

// routes for groups
Route::resource('groups', 'GroupsController');
Route::get('groups/{id}/members', 'GroupsController@view_members');
Route::get('groups/members', 'GroupsController@members');
