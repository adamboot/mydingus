<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// HOME ************************************************************/
Route::get('/', 'HomeController@showWelcome');

// ACCOUNT *********************************************************/
Route::get('account/create', 'AccountController@create');
Route::post('account/store', 'AccountController@store');
Route::post('account/login', 'AccountController@login');
Route::get('account/logout', 'AccountController@logout');

// CLIENT **********************************************************/
Route::get('client/create', array('before' => 'auth', 'uses' =>  'ClientController@create'));
Route::post('client/store', array('before' => 'auth', 'uses' =>  'ClientController@store'));
Route::get('client/edit/{id}', array('before' => 'auth', 'uses' =>  'ClientController@edit'));
Route::post('client/update/{id}', array('before' => 'auth', 'uses' =>  'ClientController@update'));
Route::get('client/delete/{id}', array('before' => 'auth', 'uses' =>  'ClientController@destroy'));

// DASHBOARD *******************************************************/
Route::get('dashboard', array('before' => 'auth', 'uses' =>  'DashboardController@index'));

// INVOICE *********************************************************/
Route::get('invoice/create', array('before' => 'auth', 'uses' =>  'InvoiceController@create'));
Route::post('invoice/store', array('before' => 'auth', 'uses' =>  'InvoiceController@store'));
Route::get('invoice/edit/{id}', array('before' => 'auth', 'uses' =>  'InvoiceController@edit'));
Route::post('invoice/update/{id}', array('before' => 'auth', 'uses' =>  'InvoiceController@update'));
Route::get('invoice/delete/{id}', array('before' => 'auth', 'uses' =>  'InvoiceController@destroy'));
Route::get('invoice/mark_paid/{id}', array('before' => 'auth', 'uses' =>  'InvoiceController@mark_paid'));