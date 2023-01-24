<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Users\UsersController;
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

// Public Routes
Route::get('/index', [PostsController::class, 'index']);

Route::get('/{id}/show', [PostsController::class, 'show']);

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/login', [LoginController::class, 'store']);

// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::post('/store', [PostsController::class, 'store']);

    Route::put('/{id}/update', [PostsController::class, 'update']);

    Route::get('/{title}/search', [PostsController::class, 'search']);

    Route::delete('/{id}/delete', [PostsController::class, 'destroy']);

    Route::post('/logout', [UsersController::class, 'logout']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
