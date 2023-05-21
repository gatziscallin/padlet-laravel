<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PadletController;
use \App\Http\Controllers\EntrieController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\RatingController;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['api','auth.jwt']], function () {
    // Padlet - geschützte Routen
    Route::post('padlets', [PadletController::class,'save']);
    Route::put('padlets/{id}', [PadletController::class,'update']);
    Route::delete('/padlets/{id}', [PadletController::class, 'delete']);

    // Entries - geschützte Routen
    Route::post('padlets/{padlet_id}/entries', [EntrieController::class, 'save']);
    Route::delete('entries/{id}', [EntrieController::class, 'delete']);
    Route::put('entries/{id}', [EntrieController::class,'update']);

    // Comments - geschütze Route (man kann nur kommentieren wenn man angemeldet ist)
    Route::post('entries/{entrie_id}/comments', [CommentController::class, 'save']);

    // Ratings - geschützte Route
    Route::post('entries/{entrie_id}/saveRatings', [RatingController::class, 'save']);

    // Logout
    Route::post('auth/logout', [AuthController::class, 'logout']);
});

// Padlet
Route::get('padlets', [PadletController::class,'index']);
Route::get('padlets/{id}', [PadletController::class,'findById']);
Route::get('padlets/check/{id}', [PadletController::class,'checkId']);
Route::get('/padlets/search/{searchTerm}', [PadletController::class, 'findBySearchTerm']);

// Entries
Route::get('entries', [EntrieController::class,'index']);
Route::get('padlets/{padlet_id}/entries', [EntrieController::class,'findByPadletID']);
Route::get('entries/{id}', [EntrieController::class,'findById']);

// Comments
Route::get('comments', [CommentController::class,'index']);
Route::get('entries/{entrie_id}/comments', [CommentController::class,'findByEntryID']);
Route::get('entries/{entrie_id}/comments', [CommentController::class,'findByEntryID']);

// Ratings
Route::get('ratings', [RatingController::class,'index']);
Route::get('entries/{entrie_id}/findRatings', [RatingController::class,'findByEntryID']);
Route::get('entries/{entrie_id}/ratings', [RatingController::class,'findByEntryID']);

// User
Route::get('users/{id}', [UserController::class, 'findById']);

// Autentifikation - Login
Route::post('auth/login', [AuthController::class,'login']);
