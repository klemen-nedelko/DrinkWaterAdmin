<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\WaterAmountController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('deleteUser', [UserController::class, 'deleteUser']);
Route::post('allUsers', [UserController::class, 'allUsers']);
Route::post('forgotPassword', [ResetPasswordController::class, 'forgotPassword']);
Route::post('password/resetPassword', [ResetPasswordController::class, 'resetPassword']);
Route::post('amountWrite', [WaterAmountController::class, 'amountWrite']);
Route::get('amountDisplay', [WaterAmountController::class, 'amountDisplay']);




Route::middleware('auth:api')->get('/authorization', function (Request $request){
    return $request->user();
});
