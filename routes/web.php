<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('/auth/redirect', ('Auth\AuthController@authorization'))->name('login');
Route::get('/auth/callback', ('Auth\AuthController@authorizationCallback'));
Route::post('/logout', 'Auth\AuthController@logout')->middleware('auth');

Route::post('/contact/add', ('Api\ContactsController@store'));

Route::get('/contacts/get-all', ('Api\ContactsController@index'))->middleware('auth');

Route::get('/groups', ('Api\GroupsController@index'))->middleware('auth');
Route::get('/api/groups', ('Api\GroupsController@index'))->middleware('auth');


Route::view('/{any}', 'index')->where('any', '.*')->middleware('auth');

