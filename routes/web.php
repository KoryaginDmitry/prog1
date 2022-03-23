<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AddInfoConrtroller;
use App\Http\Controllers\GetInfoController;
use App\Http\Controllers\SettingsController;

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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [AddInfoConrtroller::class, 'form'])->name('day');
    Route::post('/AddInfo', [AddInfoConrtroller::class, 'Add'])->name('AddInfo');
    Route::post('/UpdateInfo', [AddInfoConrtroller::class, 'update'])->name('updateInfo');
    Route::get('/dateGetInfo', [AddInfoConrtroller::class, 'dateGetInfo']);
    Route::get('/delete/{date}', [AddInfoConrtroller::class, 'delete']);

    Route::get('/info', [GetInfoController::class, 'viewInfo'])->name('info');

    Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settingsUpdate');
    Route::get('/getPercent', [SettingsController::class, 'getPercent']);
    Route::get('/getHourlyPayment', [SettingsController::class, 'getHourlyPayment']);
});

Auth::routes();
