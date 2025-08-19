<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TraitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sayhello', [TraitController::class, 'getHello']);
Route::get('/getCode', [TraitController::class, 'getCode']);
Route::get('/say-hello', [ServiceController::class, 'getHello']);
Route::get('/get-code', [ServiceController::class, 'getCode']);
Route::view('/image', 'image');
Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('image.upload');
