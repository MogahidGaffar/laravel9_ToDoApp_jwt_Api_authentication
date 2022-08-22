<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JWTAuthController;

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


Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);
Route::post('getUser', [JWTAuthController::class, 'getUser']);
Route::post('logout', [JWTAuthController::class, 'logout']);

Route::group(['middleware' => 'jwt.auth'], function () {
 
    Route::post('logout', [JWTAuthController::class, 'logout']);
  
});

