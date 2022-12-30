<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MessageController::class, 'index']);

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [UserController::class, 'register_index']);
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'login_index']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::middleware(['user'])->group(function() {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/fav/{id}', [MessageController::class, 'fav_message']);
    Route::post('/dislike/{id}', [MessageController::class, 'dislike_message']);
    Route::get('/createMessage', [MessageController::class, 'create_index']);
    Route::post('/createMessage', [MessageController::class, 'new_message']);
    Route::get('/updateMessage/{id}', [MessageController::class, 'update_message']);
    Route::post('updateMessage/{id}', [MessageController::class, 'update']);
    Route::post('/delete/{id}', [MessageController::class, 'delete_message']);
    Route::get('/profile', [MessageController::class, 'my_message']);
});