<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\SupplierController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
});


Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'auth'

], function () {

    Route::get('supplier', [SupplierController::class, 'index']);
    Route::get('supplier/{id}', [SupplierController::class, 'show']);
    Route::get('supplier/{id}/edit', [SupplierController::class, 'edit']);
    Route::post('supplier', [SupplierController::class, 'store']);
    Route::put('supplier/{id}/edit', [SupplierController::class, 'update']);
    Route::delete('supplier/{id}/delete', [SupplierController::class, 'destroy']);
});
