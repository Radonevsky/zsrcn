<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Article\ArticleController;
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

Route::group(['prefix' => 'articles', 'namespace' => 'Post'], function() {
    Route::get('/', [ArticleController::class, 'index'])->name('article_index');
    Route::put('/', [ArticleController::class, 'update'])->name('article_update');
    Route::post('/', [ArticleController::class, 'store'])->name('article_store');
    Route::delete('/{id}', [ArticleController::class, 'remove'])->name('article_remove');
});
