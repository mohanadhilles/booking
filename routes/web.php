<?php

use Illuminate\Support\Facades\Route;

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

    Eventmie::routes();
    Route::get('payment/{id}/{amount}','HomeController@payment')->name('pay.tap');
    Route::get('redirect/payment/{id}','HomeController@redirect')->name('pay.redirect');
