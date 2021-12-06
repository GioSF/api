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
});

Route::apiResource('cards', \App\Http\Controllers\CardController::class);
Route::apiResource('contributions', \App\Http\Controllers\ContributionController::class);
Route::apiResource('documents', \App\Http\Controllers\DocumentController::class);
Route::apiResource('issues', \App\Http\Controllers\IssueController::class);
Route::apiResource('journals', \App\Http\Controllers\JournalsController::class);
Route::apiResource('news', \App\Http\Controllers\NewsController::class);
Route::apiResource('pages', \App\Http\Controllers\PageController::class);

Route::get('journals/journal-years/{journal}', [\App\Http\Controllers\JournalsController::class, 'getJournalYears']);
Route::get('journals/journal-months/{journal}/{year}', [\App\Http\Controllers\JournalsController::class, 'getYearMonthsJournal']);
Route::get('journals/journal-issues/{journal}/{year}/{month}', [\App\Http\Controllers\JournalsController::class, 'getMonthIssuesJournals']);
Route::get('journals/journal-pages/{journal}/{year}/{month}/{issue}', [\App\Http\Controllers\JournalsController::class, 'getJournalIssue']);
Route::get('journals/journal-page/{page}', [\App\Http\Controllers\JournalsController::class, 'getPageView']);

