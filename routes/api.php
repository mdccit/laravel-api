<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use app/Http/Controllers/UserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

error_log("API routes file loaded");

//Auth Routes
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['web'])->group(function () {
    Route::get('/csrf-token', [AuthController::class , 'getCsrfToken']);
});


//User Management Routes
Route::post('user', [UserController::class, 'create']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::get('user/{id}', [UserController::class, 'show']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/example', function () {
    return response()->json(['message' => 'Hello, World!']);
});


