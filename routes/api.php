<?php

use Illuminate\Support\Facades\Route;

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

// // Route::group(["middleware"=> "auth:sanctum"], function(){
// Route::post("/logout", [AuthController::class, "logout"]);
// Route::post("/logout", 'AuthController@logout')->middleware('auth:sanctum');

// Route::post("/register",[AuthController::class,"register"]);

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post("/register",[AuthController::class,"register"]);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});