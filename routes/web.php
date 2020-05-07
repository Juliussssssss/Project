<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('/auth/redirect', ('Auth\AuthController@authorization'))->name('login');
Route::get('/auth/callback', ('Auth\AuthController@authorizationCallback'));
Route::post('/logout', 'Auth\AuthController@logout')->middleware('auth');

Route::post('/api/contact', ('Api\ContactsController@store'))->middleware('auth');
Route::put('/api/contact/{contact}', ('Api\ContactsController@update'))->middleware('auth');

Route::get('/contacts/get-all', ('Api\ContactsController@getContacts'))->middleware('auth');
Route::post('/contacts/set-favorites', ('Api\ContactsController@setFavorites'))->middleware('auth');

Route::delete('/api/groups', ('Api\GroupsController@destroy'))->middleware('auth');
Route::get('/api/groups', ('Api\GroupsController@index'))->middleware('auth');
Route::post('/api/groups', ('Api\GroupsController@store'))->middleware('auth');


Route::view('/{any}', 'index')->where('any', '.*')->middleware('auth');

