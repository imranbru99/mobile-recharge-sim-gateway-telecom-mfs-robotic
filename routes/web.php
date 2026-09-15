<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes & Web Frontend
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| iRobotic Android Device Gateway Protocol (Backward Compatible)
|--------------------------------------------------------------------------
*/
Route::prefix('irobotic')->group(function () {
    Route::post('/get_list', [ApiController::class, 'getList'])->name('irobotic.get_list');
    Route::post('/make_update/{service_id}', [ApiController::class, 'makeUpdate'])->name('irobotic.make_update');
    Route::post('/smsin', [ApiController::class, 'smsIn'])->name('irobotic.smsin');
});

/*
|--------------------------------------------------------------------------
| Modern REST API (v1) for Clients, Merchants & Fleet Management
|--------------------------------------------------------------------------
*/
Route::prefix('api/v1')->group(function () {
    // Recharge & Service Endpoints
    Route::post('/recharge/create', [ApiController::class, 'createRecharge'])->name('api.recharge.create');
    Route::get('/recharge/{id}', [ApiController::class, 'getRechargeStatus'])->name('api.recharge.status');
    Route::get('/recharge', [ApiController::class, 'getRechargeStatus'])->name('api.recharge.list'); // query param support

    // Fleet & Device Management
    Route::get('/devices', [ApiController::class, 'getDevices'])->name('api.devices.index');

    // SMS Intelligence & Inbox
    Route::get('/sms', [ApiController::class, 'getSms'])->name('api.sms.index');
    Route::post('/sms/parse', [ApiController::class, 'parseSmsDirect'])->name('api.sms.parse');

    // System Stats & Health
    Route::get('/stats', [ApiController::class, 'getStats'])->name('api.stats');
    Route::get('/health', [ApiController::class, 'healthCheck'])->name('api.health');
});
