<?php

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

Route::get('/', [\App\Http\Controllers\MessageController::class, 'index']);
Route::get('/register', [\App\Http\Controllers\UserController::class, 'register_index']);
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::get('/login', [\App\Http\Controllers\UserController::class, 'login_index']);
Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout']);

//Route::group(['middleware'=>'check'], function (){
    Route::post('/fav/{id}', [\App\Http\Controllers\MessageController::class, 'fav_message']);
    Route::post('/dislike/{id}', [\App\Http\Controllers\MessageController::class, 'dislike_message']);
    Route::get('/createMessage', [\App\Http\Controllers\MessageController::class, 'create_index']);
    Route::post('/createMessage', [\App\Http\Controllers\MessageController::class, 'new_message']);
    Route::get('/updateMessage/{id}', [\App\Http\Controllers\MessageController::class, 'update_message']);
    Route::post('updateMessage/{id}', [\App\Http\Controllers\MessageController::class, 'update']);
    Route::post('/delete/{id}', [\App\Http\Controllers\MessageController::class, 'delete_message']);
    Route::get('/profile', function () {return view('profile');});
//});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
