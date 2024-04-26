<?php

use App\Http\Controllers\Album\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\MailController;
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

Route::group(['prefix' => 'articles', 'namespace' => 'Post'], function() {
    Route::get('/', [ArticleController::class, 'index'])->name('article_index');
});

Route::group(['prefix' => 'albums', 'namespace' => 'Album'], function() {
    Route::get('/', [AlbumController::class, 'index'])->name('album_index');
    Route::get('/{id}', [AlbumController::class, 'getOtherPhotos'])->name('album_other_photos');
});

Route::group(['prefix' => 'documents', 'namespace' => 'Document'], function() {
    Route::get('/{type}', [DocumentController::class, 'index'])->name('document_index');
    Route::get('/scope/{type}', [DocumentController::class, 'getDocuments'])->name('document_types');
    Route::get('/uuid/{uuid}', [DocumentController::class, 'getDocumentByUuid'])->name('get_document');
    Route::get('/download/{uuid}', [DocumentController::class, 'getDocumentDownloadByUuid'])->name('get_document_uuid');
});

Route::post('/send-feedback', [MailController::class, 'sendFeedback'])->name('send_feedback');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->name('me');

    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::group(['prefix' => 'articles', 'namespace' => 'Post'], function() {
            Route::put('/{id}', [ArticleController::class, 'update'])->name('article_update');
            Route::post('/', [ArticleController::class, 'store'])->name('article_store');
            Route::delete('/{id}', [ArticleController::class, 'remove'])->name('article_remove');
        });
        Route::group(['prefix' => 'photos', 'namespace' => 'Photo'], function() {
            Route::delete('/{id}', [GalleryController::class, 'remove'])->name('photo_remove');
        });
        Route::group(['prefix' => 'albums', 'namespace' => 'Album'], function() {
            Route::post('/', [AlbumController::class, 'store'])->name('album_store');
            Route::post('/{albumId}', [AlbumController::class, 'storePhotosToAlbum'])->name('add_photos');
            Route::delete('/{id}', [AlbumController::class, 'remove'])->name('album_remove');
        });
        Route::group(['prefix' => 'documents', 'namespace' => 'Document'], function() {
            Route::delete('/uuid/{uuid}', [DocumentController::class, 'removeDocumentByUuid'])->name('del_document');
            Route::patch('/description/{uuid}', [DocumentController::class, 'updateDocumentDescription'])->name('update_description_document');
            Route::post('/uuid/{uuid}', [DocumentController::class, 'replaceDocumentByUuid'])->name('replace_document');
            Route::post('/{type}', [DocumentController::class, 'store'])->name('document_store');
        });
    });
});
