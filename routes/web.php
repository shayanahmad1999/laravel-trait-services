<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TraitController;
use App\Http\Controllers\UserController;
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
Route::get('/format-date', [TraitController::class, 'getFormatDate']);
Route::view('/post', 'post');
Route::post('/post/upload', [TraitController::class, 'store'])->name('post.store');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::middleware(['auth'])->group(function () {
    Route::view('/user-setting', 'user-setting');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [UserController::class, 'updateAvatar'])->name('profile.avatar');
    Route::post('/profile/theme', [UserController::class, 'toggleTheme'])->name('profile.theme');
});
