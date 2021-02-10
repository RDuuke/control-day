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

Route::prefix('login')->group( function(){

    Route::get('/admin', 'AdminController@login')->name('admin.login');
    Route::post('/admin/sigin', 'AdminController@sigin')->name('admin.sigin');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

    Route::get('/promoter', 'PromoterController@index')->name('promoter');
    Route::post('/promoter', 'PromoterController@singin')->name('promoter.sing');

} );


//Admin's routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function(){

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/promoter/create', 'AdminController@create')->name('admin.promoter.create');
    Route::post('/promoter/store', 'AdminController@store')->name('admin.promoter.store');
    Route::get('/promoter/{id}/edit', 'AdminController@edit')->name('admin.promoter.edit');
    Route::post('/promoter/{id}/update', 'AdminController@update')->name('admin.promoter.update');
    Route::get('/promoter/{id}/delete', 'AdminController@delete')->name('admin.promoter.delete');
    Route::get('/promoter/{id}/reintegrate', 'AdminController@reintegrate')->name('admin.promoter.reintegrate');
    Route::get('/promoter/{id}/show', 'AdminController@showPromoter')->name('admin.promoter.show');
    Route::get('/promoter/{id_promoter}/register/{id_register}/show', 'AdminController@showRegisterPromoter')->name('admin.promoter.register.show');

} );

Route::group(['prefix' => 'promoter', 'middleware' => 'auth.promoter'], function(){

    Route::get('/{id}/controls', 'PromoterController@controls')->name('promoter.controls');
    Route::get('/{id}/controls/create', 'PromoterController@controlsCreate')->name('promoter.controls.create');
    Route::post('/{id}/controls/store', 'PromoterController@controlsStore')->name('promoter.controls.store');
    Route::get('/{iduser}/controls/{id}/details', 'PromoterController@controlDetails')->name('promoter.control.detail');
    Route::get('/controls/{id}/edit', 'PromoterController@controlsEdit')->name('promoter.control.edit');
    Route::post('/controls/{id}/update', 'PromoterController@controlsUpdate')->name('promoter.control.update');
    Route::get('/controls/{id}/delete', 'PromoterController@controlsDelete')->name('promoter.control.delete');
    Route::get('/logout', 'PromoterController@logout')->name('promoter.logout');

} );

// Route::get('/promoter', 'PromoterController@index')->name('promoter');
// Route::post('/promoter', 'PromoterController@singin')->name('promoter.sing');
// Route::get('/promoter/{id}/controls', 'PromoterController@controls')->name('promoter.controls');
// Route::get('/promoter/{id}/controls/create', 'PromoterController@controlsCreate')->name('promoter.controls.create');
// Route::post('/promoter/{id}/controls/store', 'PromoterController@controlsStore')->name('promoter.controls.store');
// Route::get('/promoter/{iduser}/controls/{id}/details', 'PromoterController@controlDetails')->name('promoter.control.detail');
// Route::get('/promoter/logout', 'PromoterController@logout')->name('promoter.logout');


Route::get('/admin/first', function(){

    $admin = App\Admin::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Illuminate\Support\Facades\Hash::make('12345admin')

    ]);

    dd($admin);


});