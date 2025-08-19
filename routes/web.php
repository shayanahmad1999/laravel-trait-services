<?php

use App\Http\Controllers\TraitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sayhello', [TraitController::class, 'getHello']);
