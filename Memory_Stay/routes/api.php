<?php

use App\Http\Controllers\Auth\CreateUserController;
use App\Http\Controllers\Auth\DeleteUserController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Marker\CreateController;
use App\Http\Controllers\Marker\DeleteController;
use App\Http\Controllers\Marker\SelectController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\EmailVerificationController;

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

Route::post('/auth/register', [CreateUserController::class, 'createUser']);
Route::post('/auth/login', [LoginUserController::class, 'loginUser']);
Route::post('/auth/delete', [DeleteUserController::class, 'deleteUser'])->middleware('auth:sanctum');
Route::post('/markers/create', [CreateController::class, 'createMarker'])->middleware('auth:sanctum');
Route::post('/markers/delete', [DeleteController::class, 'deleteMarker'])->middleware('auth:sanctum');
Route::post('/markers/select', [SelectController::class, 'selectMarker'])   ;
Route::get('/markers/get', [SelectController::class, 'getMarkers']);

Route::post('/auth/email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');