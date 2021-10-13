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

Route::middleware('auth:api')->prefix('v1')->group(function() {
	Route::get('/user', function(Request $request){
		return $request->user();
	});

	Route::apiResource('cards', \App\Http\Controllers\CardController::class);
	Route::apiResource('journals', \App\Http\Controllers\JournalsController::class);
	Route::apiResource('news', \App\Http\Controllers\NewsController::class);
	Route::apiResource('roles', \App\Http\Controllers\RoleController::class);
});
