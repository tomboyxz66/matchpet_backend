<?php

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

Route::post("login",[App\Http\Controllers\Api\Login::class,'login']);
Route::post("register",[App\Http\Controllers\Api\Login::class,'register']);
Route::post("get_pet_by_user",[App\Http\Controllers\Api\pet_controller::class,'get_pet_by_user']);
