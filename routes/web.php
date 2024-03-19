<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{any}', function () {
    return view('app');
});
Route::get('/', function () {
    return view('app');
});
Route::get('/feedback/{any}', function () {
    return view('app');
});
Route::get('/about/{any}', function () {
    return view('app');
});
Route::get('/documents/{any}', function () {
    return view('app');
});
Route::get('/documents/charter/{any}', function () {
    return view('app');
});
Route::get('/documents/passport/{any}', function () {
    return view('app');
});
Route::get('/documents/inspection-reports/{any}', function () {
    return view('app');
});
Route::get('/statements/{any}', function () {
    return view('app');
});
Route::get('/statements/{any}/{uuid}', function () {
    return view('app');
});
Route::get('/planning/{any}', function () {
    return view('app');
});
Route::get('/planning/{any}/{uuid}', function () {
    return view('app');
});
Route::get('/support-foster/{any}', function () {
    return view('app');
});
Route::get('/support-foster/{any}/{uuid}', function () {
    return view('app');
});
