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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);

require __DIR__.'/auth.php';


Route::get('/ricercaDocumenti', function () {
    return view('ricercaDocumenti');
})->middleware(['auth']);

Route::get('/statoConsensi', function () {
    return view('statoConsensi');
})->middleware(['auth']);

Route::get('/recuperoModulistica', function () {
    return view('recuperoModulistica');
})->middleware(['auth']);

Route::get('/recuperoInformativa', function () {
    return view('recuperoInformativa');
})->middleware(['auth']);


Route::get('/comeSiUsa', function () {
    return view('comeSiUsa');
})->middleware(['auth']);

Route::get('/vantaggi', function () {
    return view('vantaggi');
})->middleware(['auth']);

