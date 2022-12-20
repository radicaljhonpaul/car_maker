<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/getMyCars', [CarController::class, 'index']);
    Route::post('/saveCarDetails', [CarController::class, 'store']);
    Route::post('/deleteCarDetails', [CarController::class, 'destroy']);
    

});

// Authentication
Route::post('/login', [AuthController::class, 'Login']);

Route::get('test', function(){
    return "Success";
});