<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::get('/auth/redirect', ('Auth\AuthController@authorization'))->name('login');
Route::get('/auth/callback', ('Auth\AuthController@authorizationCallback'));
Route::post('/logout', 'Auth\AuthController@logout')->middleware('auth');

Route::middleware('auth')
    ->namespace('Api')
    ->prefix('/api')
    ->group(function () {
        Route::post('/contact', 'ContactsController@store');
        Route::get('/contact/{id}', 'ContactsController@show');
        Route::post('/contact/update', 'ContactsController@update');
        Route::delete('/contacts', 'ContactsController@destroy');
        Route::get('/frequent-contacts', 'ContactsController@getFrequentContacts');
        Route::post('/contacts-import', 'ExcelController@importContacts');
        Route::get('/template', 'ExcelController@getTemplate');
        Route::get('/duplicate', 'ContactsController@getDuplicate');
        Route::put('/merge-duplicate', 'ContactsController@mergeDuplicate');

    });

Route::get('/contacts/get-all', ('Api\ContactsController@getContacts'))->middleware('auth');
Route::post('/contacts/set-favorites', ('Api\ContactsController@setFavorites'))->middleware('auth');

Route::get('/testPrint/test', ('PrintController@getContacts'))->middleware('auth');

Route::middleware('auth')
    ->namespace('Api')
    ->prefix('/api')
    ->group(function () {
        Route::get('groups', 'GroupsController@index');
        Route::get('contacts/favorites', 'ContactsController@getFavorites');
        Route::get('contacts/count', 'ContactsController@getContactsCount');
        Route::get('contacts/frequent', 'ContactsController@getCountFrequentContacts');
        Route::get('groups/{id}', 'GroupsController@show');
        Route::post('groups', 'GroupsController@store');
        Route::post('contacts/write', 'MailController@send');

        Route::delete('groups/{id}', 'GroupsController@destroy');
        Route::delete('groups/{id}/contacts', 'GroupsController@deleteGroupInContacts');
        Route::put('groups/{id}/contacts', 'GroupsController@addGroupInContacts');
    });

Route::middleware('auth')
    ->namespace('Api')
    ->prefix('contacts/export')
    ->group(function () {
        Route::get('all', 'ContactsController@exportAll');
        Route::get('frequent', 'ContactsController@exportFrequent');
        Route::get('group/{id}', 'ContactsController@exportGroup');
    });

Route::view('/{any}', 'index')->where('any', '.*')->middleware('auth');
