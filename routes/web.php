<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PadletController;

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

// home route, welche auf die Index führt, zeigt Übersicht der Padlets an
Route::get('/', [PadletController::class,'index']);

// bei url /padlet am ende, kommt man auch auf Homescreen
Route::get('/padlets', [PadletController::class,'index']);

// Route führt auf einzelne Padlet-Seiten
Route::get('/padlets/{padlet}',[PadletController::class,'show']);
