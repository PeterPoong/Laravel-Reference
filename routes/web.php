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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\PostController::class, 'index']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/p/create',[App\Http\Controllers\PostController::class, 'create']);
Route::post('/p',[App\Http\Controllers\PostController::class, 'store']);
Route::get('/p/{postid}',[App\Http\Controllers\PostController::class, 'show']);
Route::get('/profile/{user}/edit',[App\Http\Controllers\ProfileController::class, 'edit']);
Route::patch('/profile/{user}',[App\Http\Controllers\ProfileController::class, 'update']);
//return data in json format
Route::get('/returnJsonFormat', [App\Http\Controllers\ProfileController::class, 'test'])->name('home');

Route::post('/follow/{user}',[App\Http\Controllers\FollowsController::class, 'store']);

// 2:40:00
//2:55:00
//3:43 (having unfollow and follow buttton issue it wont chanage)