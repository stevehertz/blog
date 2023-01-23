<?php

use App\Http\Controllers\Posts\PostsController;
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

Route::get('/index', [PostsController::class, 'index']);

Route::post('/store', [PostsController::class, 'store']);

Route::get('/{id}/show', [PostsController::class, 'show']);

Route::put('/{id}/update', [PostsController::class, 'update']);

Route::delete('/{id}/delete', [PostsController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
