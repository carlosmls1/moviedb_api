<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowCtrl;
use App\Http\Controllers\ProfileCtrl;
use App\Http\Controllers\UserCtrl;
use \App\Http\Controllers\FrontendCtrl;
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


Route::group(['controller'=> FrontendCtrl::class], function () {
    Route::get('/', 'index')->name('front.index');
    Route::get('/s/{show}', 'show')->name('front.show');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix'=>'profile', 'controller'=> ProfileCtrl::class], function (){
        Route::get('/', 'show')->name('profile.show');
        Route::put('/', 'update')->name('profile.update');
    });

    Route::group(['prefix' => 'users', 'controller'=> UserCtrl::class], function () {
        Route::get('/', 'index')->name('user.index');
        Route::get('/create', 'create')->name('user.create');
        Route::get('/edit/{user}', 'edit')->name('user.edit');
        Route::get('/show/{user}', 'show')->name('user.show');

        Route::put('/edit/{user}','update')->name('user.update');
        Route::post('/store', 'store')->name('user.store');

        Route::delete('/delete/{user}', 'delete')->name('user.delete');
    });

    Route::group(['prefix' => 'show', 'controller'=> ShowCtrl::class], function () {
        Route::get('/', 'index')->name('show.index');
        Route::get('/create', 'create')->name('show.create');
        Route::get('/edit/{show}', 'edit')->name('show.edit');
        Route::get('/show/{show}', 'show')->name('show.show');

        Route::put('/edit/{show}','update')->name('show.update');
        Route::post('/store', 'store')->name('show.store');

        Route::delete('/delete/{show}', 'delete')->name('show.delete');
    });
});



require __DIR__.'/auth.php';
