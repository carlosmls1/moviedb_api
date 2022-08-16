<?php

use App\Http\Controllers\API\AuthCtrl;
use App\Http\Controllers\API\ShowCtrl;
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


Route::group([
    'prefix' => 'auth',
    'controller'=>AuthCtrl::class,
], function () {
    Route::post('login', 'login');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'logout');
        Route::get('user', 'user');
    });
});
Route::group([
    'prefix' => 'shows',
    'controller'=>ShowCtrl::class,
], function () {
    Route::get('list', 'index');
    Route::get('view/{show}', 'view');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::post('create', 'store');
        Route::put('update/{show}', 'update');
        Route::delete('delete/{show}', 'delete');
    });
});
