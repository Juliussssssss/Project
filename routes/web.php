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
Route::post('/api/delete-contacts', ('Api\ContactsController@destroy'))->middleware('auth');
Route::get('/api/frequent-contacts', ('Api\ContactsController@getFrequentContacts'))->middleware('auth');
Route::post('/api/contacts-import', ('Api\ExcelController@importContacts'))->middleware('auth');

Route::get('/contacts/get-all', ('Api\ContactsController@getContacts'))->middleware('auth');
Route::post('/contacts/set-favorites', ('Api\ContactsController@setFavorites'))->middleware('auth');

Route::get('/testPrint/test',('PrintController@getContacts'))->middleware('auth');

Route::post('/api/groups', ('Api\GroupsController@destroy'))->middleware('auth');
Route::get('/api/groups', ('Api\GroupsController@index'))->middleware('auth');
Route::post('/api/groups', ('Api\GroupsController@store'))->middleware('auth');
Route::get('/api/groups/{id}', ('Api\GroupsController@show'))->middleware('auth');

Route::middleware('auth')
    ->namespace('Api')
    ->prefix('/api')
    ->group(function () {
        Route::get('groups', 'GroupsController@index');
        Route::get('contacts/favorites', 'ContactsController@favorites');
        Route::get('contacts/count', 'ContactsController@getContactsCount');
        Route::get('contacts/frequent', 'ContactsController@getCountFrequentContacts');
        Route::get('groups/{id}', 'GroupsController@show');
        Route::post('groups', 'GroupsController@store');

        Route::delete('groups', 'GroupsController@destroy');
        Route::delete('groups/{id}/contacts', 'GroupsController@deleteGroupAtContacts');
        Route::put('groups/{id}/contacts', 'GroupsController@addGroupAtContacts');
    });

Route::get('contacts/export/all', 'Api\ContactsController@exportAll');
Route::get('contacts/export/frequent', 'Api\ContactsController@exportFrequent');
Route::get('contacts/export/group/{id}', 'Api\ContactsController@exportGroup');

Route::view('/{any}', 'index')->where('any', '.*')->middleware('auth');
