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
    return view('start');
});

Route::get('options', function () {
    return view('options');
});

Route::get('subdivision/add', function () {
    return view('add_subdivision');
});
Route::post('subdivision/add', 'SubdivisionController@addSubdivision');

Route::get('employee/add', function () {
    return view('add_employee');
});
Route::post('employee/add', 'EmployeeController@addEmployee');

Route::get('manufacturer/add', function () {
    return view('add_manufacturer');
});
Route::post('manufacturer/add', 'ManufacturerController@addManufacturer');

Route::get('status/add', function () {
    return view('add_status');
});
Route::post('status/add', 'StatusController@addStatus');

Route::get('terminal/add', function () {
    return view('add_terminal');
});
Route::post('terminal/add', 'TerminalController@addTerminal');

Route::get('terminals', 'TerminalController@getTerminals');

Route::get('terminal/{id}', 'TerminalController@getTerminalById')->name('getTerminal');
Route::post('terminal/{id}/edit', 'TerminalController@changeStatus')->name('changeStatus');
Route::post('terminal/{id}/delete', 'TerminalController@deleteTerminal')->name('deleteTerminal');

Route::get('employees', 'EmployeeController@getEmployees');
Route::get('employees/{id}/filter', 'EmployeeController@filterEmployees')->name('filterEmployees');

Route::post('option/paginate', 'OptionController@setPagination');