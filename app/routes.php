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

Route::get('/', function()
{
	return Redirect::to('/atm');
});

Route::get('/atm','RouteController@atm');

Route::get('/otc','RouteController@otc');
Route::post('/otc','AuthController@login');
Route::post('/atm','AuthController@login_atm');

Route::get('/otc/profile','RouteController@profile');
Route::get('/atm/profile','RouteController@profile_atm');


//TELLERS
Route::get('/otc/tellers','TellerController@index');
Route::get('/otc/tellers/create','TellerController@create');
Route::post('/otc/tellers/create','TellerController@store');
Route::get('/otc/tellers/edit/{id}','TellerController@edit');
Route::post('/otc/tellers/edit/{id}','TellerController@update');
Route::get('/otc/tellers/activate/{id}', 'TellerController@activate');
Route::get('/otc/tellers/deactivate/{id}', 'TellerController@deactivate');

// Transactions
Route::get('/otc/transactions', 'TellerController@transactions');
Route::get('/otc/transactions/withdraw', 'TellerController@withdraw');
Route::post('/otc/transactions/withdraw', 'TellerController@acceptWithdraw');
Route::get('/otc/transactions/deposit', 'TellerController@deposit');
Route::post('/otc/transactions/deposit', 'TellerController@acceptDeposit');
Route::get('/otc/transactions/checkAccount/{accountNumber}', 'TellerController@checkAccount');

Route::get('/otc/bank_manager/audit_trail', 'BankManagerController@auditTrail');
Route::post('/otc/bank_manager/audit_trail', 'BankManagerController@auditTrailChangeDate');

//Bank Assistant
Route::get('/otc/bank_assistant','BankAssistantController@index');
Route::get('/otc/bank_assistant/create','BankAssistantController@create');
Route::post('/otc/bank_assistant/create','BankAssistantController@store');
Route::get('/otc/bank_assistant/edit/{id}','BankAssistantController@edit');
Route::post('/otc/bank_assistant/edit/{id}','BankAssistantController@update');


//Bank Managers
Route::get('/otc/bank_manager','BankManagerController@index');
Route::get('/otc/bank_manager/create','BankManagerController@create');
Route::post('/otc/bank_manager/create','BankManagerController@store');
Route::get('/otc/bank_manager/edit/{id}','BankManagerController@edit');
Route::post('/otc/bank_manager/edit/{id}','BankManagerController@update');


//CUSTOMERS
Route::get('/otc/customers','CustomerController@index');
Route::get('/otc/customersfixed','CustomerController@customerFixed');
Route::get('/otc/customers/create', 'CustomerController@create');
Route::post('/otc/customers/create', 'CustomerController@store');
Route::get('/otc/customers/edit/{accountNumber}', 'CustomerController@edit');
Route::post('/otc/customers/edit/{accountNumber}', 'CustomerController@update');


Route::get('/atm/changepass/{id}', 'AuthController@editpass');
Route::post('/atm/changepass/{id}', 'AuthController@changepass');
Route::get('/atm/deposit/{id}', 'AuthController@deposit');
Route::post('/atm/deposit/{id}', 'AuthController@storedeposit');
Route::get('/atm/withdraw/{id}', 'AuthController@withdraw');
Route::post('/atm/withdraw/{id}', 'AuthController@storewithdraw');

Route::get('/atm/transfer/{id}', 'AuthController@transfer');
Route::post('/atm/transfer/{id}', 'AuthController@storetransfer');


Route::get('/atm/passbook', 'AtmController@passbook');
Route::post('/atm/passbook', 'AtmController@passbookChangeDate');


Route::get('/logout', 'AuthController@logout');

//Clearing Day

Route::get('/otc/Clearing', 'ClearingController@CheckAccounts');





