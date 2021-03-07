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



Auth::routes();

Route::get('companies', 'CompanyController@index');

Route::middleware(['auth', 'company'])->group(function () {
    Route::get('/', function () {
        return redirect(route('home'));
    });
});
Route::get('/account', 'UserController@index')->name('account');
Route::get('/user-create', 'UserController@create')->name('userCreate');
Route::post('/user-store', 'UserController@store')->name('userStore');
Route::get('/account-settings', 'UserController@settingsShow')->name('accountSettings');
Route::get('customers-search', 'CustomerController@search');
Route::resource('carriers', 'CarrierController');
Route::resource('load-history', 'LoadHistoryController');

Route::get('loads-search', 'LoadController@search');

Route::resource('dispatchers', 'DispatcherController');
Route::get('dispatcher-search', 'DispatcherController@search');

Route::get('/import-carrier', function(){
    $aaa = \Excel::import(new CarriersImport, public_path('/assets/carriers.xls'));
});
Route::get('/import-customer', function(){
    $aaa = \Excel::import(new CustomersImport, public_path('/assets/customer.xlsx'));
});
Route::get('profileSettings', 'CompanyController@profileSettings');

//superAdminRoutes
Route::post('/setAppCompany', 'CompanyController@setAppCompany');

Route::prefix('{company_id}')->middleware(['auth', 'company'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('companies', 'CompanyController');
    Route::resource('loads', 'LoadController');
    Route::resource('customers', 'CustomerController');
});
