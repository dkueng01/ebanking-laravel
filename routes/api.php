<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('transactions', 'App\Http\Controllers\Api\TransactionController@index');

Route::get('transactions/account/{iban}', 'App\Http\Controllers\Api\TransactionController@getAllUserTransactions');

Route::get('accounts', 'App\Http\Controllers\Api\AccountController@index');

Route::get('accounts/{user_id}', 'App\Http\Controllers\Api\AccountController@getAccountByOwner');

Route::post('transactions', 'App\Http\Controllers\Api\TransactionController@createTransaction');

Route::get('transactions/search/{search}', 'App\Http\Controllers\Api\TransactionController@getTransactionFromSearch');




