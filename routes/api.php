<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Client routes

Route::get('/clients', [ClientController::class, 'index']);
Route::get('/client/getCars/{id}', [ClientController::class, 'getCars']);

//Service routes
Route::get('/service/{client_id}/{car_id}', [ServiceController::class, 'getServices']);