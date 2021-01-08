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

Route::get('/promoter', 'PromoterController@index')->name('promoter');
Route::post('/promoter', 'PromoterController@singin')->name('promoter.sing');
Route::get('/promoter/{id}/controls', 'PromoterController@controls')->name('promoter.controls');
Route::get('/promoter/{id}/controls/create', 'PromoterController@controlsCreate')->name('promoter.controls.create');
Route::post('/promoter/{id}/controls/store', 'PromoterController@controlsStore')->name('promoter.controls.store');
Route::get('/promoter/{iduser}/controls/{id}/details', 'PromoterController@controlDetails')->name('promoter.control.detail');
Route::get('/promoter/logout', 'PromoterController@logout')->name('promoter.logout');