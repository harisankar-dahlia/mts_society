<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\SocietyController;
use App\Http\Controllers\API\AuthController;

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
Route::post('/add-society', [SocietyController::class, 'store']);
Route::post('/list-society', [SocietyController::class, 'index']);
Route::get('/show-society/{id}', [SocietyController::class, 'show']);
Route::post('/delete-society', [SocietyController::class, 'destroy']); 

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

//Only For Super Admin
Route::middleware('auth:sanctum','superadmin')->group(function () {

});
//Only For Admin
Route::middleware('auth:sanctum','admin')->group(function () {

});

//Only For User
Route::middleware('auth:sanctum','user')->group(function () {

});

//For ALL
Route::middleware('auth:sanctum')->group(function () {
});