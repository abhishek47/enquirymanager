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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/company/register', 'CompanyController@register')->name('company.register');
Route::post('/company/store', 'CompanyController@store')->name('company.store');

Route::get('/enquiries', 'EnquiriesController@index')->name('enquiries');
Route::get('/enquiries/new', 'EnquiriesController@create')->name('enquiries.create');
Route::get('/enquiries/{enquiry}', 'EnquiriesController@show')->name('enquiries.show');
Route::get('/enquiries/print/{enquiry}', 'EnquiriesController@print')->name('enquiries.print');
Route::get('/enquiries/print/{enquiry}/view', 'EnquiriesController@printview')->name('enquiries.printview');
Route::get('/enquiries/edit/{enquiry}', 'EnquiriesController@edit')->name('enquiries.edit');
Route::post('/enquiries/store', 'EnquiriesController@store')->name('enquiries.store');
Route::post('/enquiries/delete/{enquiry}', 'EnquiriesController@destroy')->name('enquiries.delete');
Route::post('/enquiries/update/{enquiry}', 'EnquiriesController@update')->name('enquiries.update');
Route::post('/enquiries/status/{enquiry}/{status}', 'EnquiriesController@status')->name('enquiries.status');
Route::get('/followups', 'FollowupsController@index')->name('enquiries.followups');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');
