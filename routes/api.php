<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['role:admin', 'auth:sanctum']], function () {
    Route::post('/register', [AuthController::class, 'createUser']);
});

Route::post('/login', [AuthController::class, 'loginUser']);

Route::resources(['/agency' => AgencyController::class]);
Route::resources(['/user' => UserController::class]);
