<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', [PhotoController::class, 'upload'])->name('upload');
    Route::post('/goingUp', [PhotoController::class, 'goingUp'])->name('goingUp');
    Route::get('/uploaded/{id}', [PhotoController::class, 'uploaded'])->name('uploaded');

    Route::delete('/photo/delete/{id?}', [PhotoController::class, 'delete'])->name('photoDelete');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
