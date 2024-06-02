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

Route::post('/register', \App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', \App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', \App\Http\Controllers\Api\LogoutController::class)->name('logout');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('levels', [\App\Http\Controllers\API\LevelController::class, 'index']);
Route::post('levels', [\App\Http\Controllers\API\LevelController::class, 'store']);
Route::get('levels/{level}', [\App\Http\Controllers\API\LevelController::class, 'show']);
Route::put('levels/{level}', [\App\Http\Controllers\API\LevelController::class, 'update']);
Route::delete('levels/{level}', [\App\Http\Controllers\API\LevelController::class, 'destroy']);

Route::get('users', [\App\Http\Controllers\API\UserController::class, 'index']);
Route::post('users', [\App\Http\Controllers\API\UserController::class, 'store']);
Route::get('users/{user}', [\App\Http\Controllers\API\UserController::class, 'show']);
Route::put('users/{user}', [\App\Http\Controllers\API\UserController::class, 'update']);
Route::delete('users/{user}', [\App\Http\Controllers\API\UserController::class, 'destroy']);

Route::get('categories', [\App\Http\Controllers\API\CategoryController::class, 'index']);
Route::post('categories', [\App\Http\Controllers\API\CategoryController::class, 'store']);
Route::get('categories/{category}', [\App\Http\Controllers\API\CategoryController::class, 'show']);
Route::put('categories/{category}', [\App\Http\Controllers\API\CategoryController::class, 'update']);
Route::delete('categories/{category}', [\App\Http\Controllers\API\CategoryController::class, 'destroy']);

Route::get('items', [\App\Http\Controllers\API\ItemController::class, 'index']);
Route::post('items', [\App\Http\Controllers\API\ItemController::class, 'store']);
Route::get('items/{item}', [\App\Http\Controllers\API\ItemController::class, 'show']);
Route::put('items/{item}', [\App\Http\Controllers\API\ItemController::class, 'update']);
Route::delete('items/{item}', [\App\Http\Controllers\API\ItemController::class, 'destroy']);