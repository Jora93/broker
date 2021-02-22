<?php
use App\Imports\CarriersImport;
use App\Imports\CustomersImport;
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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account', 'UserController@index')->name('account');
Route::get('/user-create', 'UserController@create')->name('userCreate');
Route::post('/user-store', 'UserController@store')->name('userStore');
Route::resource('customers', 'CustomerController');
Route::resource('carriers', 'CarrierController');
Route::resource('load-history', 'LoadHistoryController');

Route::resource('loads', 'LoadController');
Route::get('loads-search', 'LoadController@search');

Route::resource('dispatchers', 'DispatcherController');
Route::get('dispatcher-search', 'DispatcherController@search');

Route::get('/import-carrier', function(){
    $aaa = \Excel::import(new CarriersImport, public_path('/assets/carriers.xls'));
});
Route::get('/import-customer', function(){
    $aaa = \Excel::import(new CustomersImport, public_path('/assets/customer.xlsx'));
});
