<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('/auth/redirect', ('Auth\AuthController@authorization'))->name('login');
Route::get('/auth/callback', ('Auth\AuthController@authorizationCallback'));
Route::post('/logout', 'Auth\AuthController@logout')->middleware('auth');

Route::post('/api/contact', ('Api\ContactsController@store'))->middleware('auth');
Route::get('/api/contact/{id}', ('Api\ContactsController@show'))->middleware('auth');
Route::post('/api/contact/update', ('Api\ContactsController@update'))->middleware('auth');
Route::delete('/api/contacts', ('Api\ContactsController@destroy'))->middleware('auth');

Route::get('/contacts/get-all', ('Api\ContactsController@getContacts'))->middleware('auth');
Route::post('/contacts/set-favorites', ('Api\ContactsController@setFavorites'))->middleware('auth');

Route::delete('/api/groups', ('Api\GroupsController@destroy'))->middleware('auth');
Route::get('/api/groups', ('Api\GroupsController@index'))->middleware('auth');
Route::post('/api/groups', ('Api\GroupsController@store'))->middleware('auth');
Route::get('/api/groups/{id}', ('Api\GroupsController@show'))->middleware('auth');

Route::middleware('auth')
    ->namespace('Api')
    ->prefix('/api')
    ->group(function () {
        Route::get('groups', ('GroupsController@index'))->middleware('auth');
        Route::get('groups/{id}', ('GroupsController@show'))->middleware('auth');
        Route::post('groups', ('GroupsController@store'))->middleware('auth');


        Route::delete('groups', ('GroupsController@destroy'))->middleware('auth');
        Route::delete('groups/{id}/contacts', ('GroupsController@deleteGroupAtContacts'))->middleware('auth');
    });


Route::view('/{any}', 'index')->where('any', '.*')->middleware('auth');

