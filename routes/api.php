<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Task Routes (protected by auth middleware)
Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/users', [UserController::class, 'getAllUser']);
    // Route::get('/tasks', [TaskController::class, 'index']);
    // Route::post('/tasks', [TaskController::class, 'store']);
    // Route::get('/tasks/{id}', [TaskController::class, 'show']);
    // Route::put('/tasks/{id}', [TaskController::class, 'update']);
    // Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});

Route::middleware('auth:api')->post('/logout', [UserController::class, 'logout']);
