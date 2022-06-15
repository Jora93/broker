<?php
use App\Imports\CarriersImport;
use App\Imports\CustomersImport;
use Codedge\Fpdf\Fpdf\Fpdf;

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

Route::get('invite-carrier/{company_alias}', 'InviteCarrierController@index');
Route::post('invite-carrier-create', 'InviteCarrierController@store')->name('invite-carrier-create');
Route::get('invite-carrier-success', 'InviteCarrierController@successPage')->name('invite-carrier-success');

Auth::routes();

Route::get('companies', 'CompanyController@index');

Route::middleware(['auth', 'company'])->group(function () {
    Route::get('/', function () {
        return redirect(route('home'));
    });
});



Route::get('/import-carrier', function(){
    $aaa = \Excel::import(new CarriersImport, public_path('/assets/carriers.xls'));
});
Route::get('/import-customer', function(){
    $aaa = \Excel::import(new CustomersImport, public_path('/assets/customer.xlsx'));
});

//superAdminRoutes
Route::post('/setAppCompany', 'CompanyController@setAppCompany');

Route::prefix('{company_id}')->middleware(['company'])->group(function () {
    Route::get('carrier-search', 'CarrierController@search');
    Route::get('global-search', 'CarrierController@globalSearch');
});
Route::get('document-download/{id}', 'DocumentController@download');
Route::prefix('{company_id}')->middleware(['auth', 'company'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('loads', 'LoadController')->middleware(['cors']);
    Route::resource('documents', 'DocumentController')->middleware(['cors']);

    Route::get('accounting', 'LoadController@accounting')->name('loads.accounting');
    Route::get('invoice/{load_id}', 'LoadController@createInvoice');
    Route::resource('customers', 'CustomerController');
    Route::resource('carriers', 'CarrierController');
    Route::resource('dispatchers', 'DispatcherController');
    Route::get('dispatcher-search', 'DispatcherController@search');
    Route::get('loads-search', 'LoadController@search');
    Route::resource('load-history', 'LoadHistoryController');
//    Route::get('carrier-search', 'CarrierController@search');
    Route::get('generate-carrier-confirmation/{load_id}', 'GeneralSettingsController@createCarrierConfirmation');

    Route::get('/account', 'UserController@index')->name('account');
    Route::get('/user-create', 'UserController@create')->name('userCreate');
    Route::post('/user-store', 'UserController@store')->name('userStore');
    Route::get('/account-settings', 'UserController@settingsShow')->name('accountSettings');
    //only admin
    Route::middleware(['superAdmin'])->group(function () {
        Route::get('profileSettings', 'CompanyController@profileSettings');
        Route::post('profileSettings', 'CompanyController@UpdateProfileSettings');
        Route::resource('general-settings', 'GeneralSettingsController');
        Route::patch('general-settings-edit', 'GeneralSettingsController@update');
        Route::resource('companies', 'CompanyController');
    });
//    Route::get('invoice', 'GeneralSettingsController@invoice');
//    Route::get('aaa', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {
//        $fpdf->AddPage();
//        $fpdf->SetFont('Courier', 'B', 18);
//        $fpdf->Cell(50, 25, 'Hello World!');
//        $fpdf->Output();
//    });


    Route::get('/migrate-carriers', 'MigrationController@migrateCarriers');
    Route::get('/migrate-customers', 'MigrationController@migrateCustomers');
    Route::get('/migrate-loads', 'MigrationController@migrateLoads');
});


