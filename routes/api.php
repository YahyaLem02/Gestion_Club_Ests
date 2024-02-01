<?php

use App\Http\Controllers\API\ApiFeedbackController;
use App\Http\Controllers\API\ApiReclamationController;
use App\Http\Controllers\API\ApiClubController;
use App\Http\Controllers\ReclamationAPIController;
use App\Http\Controllers\ReclkamationAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::apiResource("/reclamation",ApiReclamationController::class);
Route::apiResource("/Feedback",ApiFeedbackController::class);
Route::apiResource("/Club",ApiClubController::class);


Route::apiResource("/reclamations",ReclkamationAPIController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();



});


