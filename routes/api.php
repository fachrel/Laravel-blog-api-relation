<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthenticationController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/posts', [TestController::class, 'index'])->middleware(['auth:sanctum']);
// Route::get('/posts/{id}', [TestController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::apiResource('posts', TestController::class)->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/current', [AuthenticationController::class, 'CurrentUser']);
});