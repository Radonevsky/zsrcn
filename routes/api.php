<?php

use App\Http\Controllers\Album\AlbumController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'articles', 'namespace' => 'Post'], function() {
    Route::get('/', [ArticleController::class, 'index'])->name('article_index');
    Route::put('/{id}', [ArticleController::class, 'update'])->name('article_update');
    Route::post('/', [ArticleController::class, 'store'])->name('article_store');
    Route::delete('/{id}', [ArticleController::class, 'remove'])->name('article_remove');
});

Route::group(['prefix' => 'photos', 'namespace' => 'Photo'], function() {
    Route::get('/', [GalleryController::class, 'index'])->name('photo_index');
    Route::post('/', [GalleryController::class, 'store'])->name('photo_store');
    Route::delete('/{id}', [GalleryController::class, 'remove'])->name('photo_remove');
});

Route::group(['prefix' => 'albums', 'namespace' => 'Album'], function() {
    Route::get('/', [AlbumController::class, 'index'])->name('album_index');
    Route::get('/{id}', [AlbumController::class, 'getOtherPhotos'])->name('album_other_photos');
    Route::post('/', [AlbumController::class, 'store'])->name('album_store');
    Route::post('/{albumId}', [AlbumController::class, 'storePhotosToAlbum'])->name('add_photos');
    Route::delete('/{id}', [AlbumController::class, 'remove'])->name('album_remove');
});

Route::group(['prefix' => 'documents', 'namespace' => 'Document'], function() {
    Route::get('/{type}', [DocumentController::class, 'index'])->name('document_index');
    Route::get('/scope/{type}', [DocumentController::class, 'getDocuments'])->name('document_types');
    Route::get('/uuid/{uuid}', [DocumentController::class, 'getDocumentByUuid'])->name('get_document');
    Route::delete('/uuid/{uuid}', [DocumentController::class, 'removeDocumentByUuid'])->name('del_document');
    Route::patch('/description/{uuid}', [DocumentController::class, 'updateDocumentDescription'])->name('update_description_document');
    Route::get('/download/{uuid}', [DocumentController::class, 'getDocumentDownloadByUuid'])->name('get_document_uuid');
    Route::post('/uuid/{uuid}', [DocumentController::class, 'replaceDocumentByUuid'])->name('replace_document');
    Route::post('/{type}', [DocumentController::class, 'store'])->name('document_store');
});

Route::post('/send-feedback', [MailController::class, 'sendFeedback'])->name('send_feedback');
