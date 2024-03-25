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
Route::get('/citizen-appeals/{any}', function () {
    return view('app');
});
Route::get('/citizen-appeals/{any}/{uuid}', function () {
    return view('app');
});
Route::get('/methodical/{any}', function () {
    return view('app');
});
Route::get('/methodical/{any}/{uuid}', function () {
    return view('app');
});
Route::get('/anti-corruption/{any}', function () {
    return view('app');
});
Route::get('/anti-corruption/{any}/{uuid}', function () {
    return view('app');
});
Route::get('/quality-assessment/{any}', function () {
    return view('app');
});
Route::get('/quality-assessment/{any}/{uuid}', function () {
    return view('app');
});
Route::get('/towards-children', function () {
    return view('app');
});
Route::get('/information-security', function () {
    return view('app');
});
Route::get('/hey-parents', function () {
    return view('app');
});

