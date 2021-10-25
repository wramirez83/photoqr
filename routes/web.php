<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePhotoController;
use App\Http\Controllers\VotePhotoController;
use App\Http\Controllers\VoteController;

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

Route::get('/', [HomePhotoController::class, 'index']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', [PhotoController::class, 'upload'])->name('upload');
    Route::post('/goingUp', [PhotoController::class, 'goingUp'])->name('goingUp');
    Route::get('/uploaded/{id}', [PhotoController::class, 'uploaded'])->name('uploaded');

    Route::delete('/photo/delete', [PhotoController::class, 'delete'])->name('photoDelete');

    //create new votes
    Route::get('/lsvote', [VoteController::class, 'index'])->name('lsvote');
    Route::post('/saveVote', [VoteController::class, 'saveVote'])->name('saveVote');
    Route::put('/updatevote', [VoteController::class, 'changeStatus'])->name('updatevote');

    //Result
    Route::get('/result', [VotePhotoController::class, 'result'])->name('result');

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
//VotePhoto

Route::get('/vt/{id?}', [VotePhotoController::class, 'vt'])->name('vt');
Route::post('/vtSave', [VotePhotoController::class, 'vtSave'])->name('vtSave');
Route::get('/tk', [VotePhotoController::class, 'tk'])->name('tk');
//Inactivo
Route::get('/inactive', function(){
    return view('inactive');
})->name('inactive');
