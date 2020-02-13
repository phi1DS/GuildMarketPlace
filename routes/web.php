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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'TradeRequestController@showOngoing')->name('TradeRequestsShowOngoing');

Route::get('/tradeRequest/create', function () {
    return view('trade_request.create');
})->name('CreateTradeRequest');

Route::post('/tradeRequest/create', 'TradeRequestController@store')->name('StoreTradeRequest');

Route::get('/tradeRequest/delete/{id}', 'TradeRequestController@delete')->name('DeleteTradeRequest');
