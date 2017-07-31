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
    //return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'HomeController@profile')->name('profile');


Route::get('/company/register', 'CompanyController@register')->name('company.register');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::get('/company/edit', 'CompanyController@edit')->name('company.edit');
Route::post('/company/update', 'CompanyController@update')->name('company.update');

Route::get('/enquiries', 'EnquiriesController@index')->name('enquiries');
Route::get('/enquiries/new', 'EnquiriesController@create')->name('enquiries.create');
Route::get('/enquiries/{enquiry}', 'EnquiriesController@show')->name('enquiries.show');
Route::get('/enquiries/recorded/{enquiry}', 'EnquiriesController@recorded')->name('enquiries.recorded');
Route::get('/enquiries/print/{enquiry}', 'EnquiriesController@print')->name('enquiries.print');
Route::get('/enquiries/print/{enquiry}/view', 'EnquiriesController@printview')->name('enquiries.printview');
Route::get('/enquiries/edit/{enquiry}', 'EnquiriesController@edit')->name('enquiries.edit');
Route::post('/enquiries/store', 'EnquiriesController@store')->name('enquiries.store');
Route::post('/enquiries/delete/{enquiry}', 'EnquiriesController@destroy')->name('enquiries.delete');
Route::post('/enquiries/update/{enquiry}', 'EnquiriesController@update')->name('enquiries.update');
Route::post('/enquiries/status/{enquiry}/{status}', 'EnquiriesController@status')->name('enquiries.status');
Route::get('/followups', 'FollowupsController@index')->name('enquiries.followups');
Route::get('/followups/print', 'FollowupsController@show')->name('followups.show');

Route::get('/statistics', 'StatisticsController@index')->name('statistics');

Route::get('/vehicles', 'VehiclesController@index')->name('vehicles');
Route::get('/vehicles/create', 'VehiclesController@create')->name('vehicles.create');
Route::post('/vehicles/store', 'VehiclesController@store')->name('vehicles.store');
Route::get('/vehicles/edit/{vehicle}', 'VehiclesController@edit')->name('vehicles.edit');
Route::get('/vehicles/cost/{vehicle}', 'VehiclesController@cost')->name('vehicles.cost');
Route::post('/vehicles/delete/{vehicle}', 'VehiclesController@destroy')->name('vehicles.delete');
Route::post('/vehicles/update/{vehicle}', 'VehiclesController@update')->name('vehicles.update');

Route::get('/financers', 'FinancersController@index')->name('financers');
Route::get('/financers/create', 'FinancersController@create')->name('financers.create');
Route::post('/financers/store', 'FinancersController@store')->name('financers.store');
Route::get('/financers/edit/{financer}', 'FinancersController@edit')->name('financers.edit');
Route::post('/financers/delete/{financer}', 'FinancersController@destroy')->name('financers.delete');
Route::post('/financers/update/{financer}', 'FinancersController@update')->name('financers.update');

Route::post('/financers/{financer}/store', 'FinanceManagersController@store')->name('finance_managers.store');
Route::get('/financers/managers/{financer}/{financeManager}', 'FinanceManagersController@edit')->name('finance_managers.edit');
Route::post('/financers/delete/managers/{financer}/{financeManager}', 'FinanceManagersController@destroy')->name('finance_managers.delete');
Route::post('/financers/update/managers/{financer}/{financeManager}', 'FinanceManagersController@update')->name('finance_managers.update');

Route::get('/employees', 'EmployeesController@index')->name('employees');
Route::get('/employees/create', 'EmployeesController@create')->name('employees.create');
Route::post('/employees/store', 'EmployeesController@store')->name('employees.store');
Route::get('/employees/edit/{user}', 'EmployeesController@edit')->name('employees.edit');
Route::post('/employees/delete/{user}', 'EmployeesController@destroy')->name('employees.delete');
Route::post('/employees/update/{user}', 'EmployeesController@update')->name('employees.update');


Route::post('/profile/update', 'HomeController@updateProfile')->name('profile.update');
Route::post('/profile/password', 'HomeController@password')->name('password.update');