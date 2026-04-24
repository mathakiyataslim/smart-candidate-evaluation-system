<?php

use App\Http\Controllers\candidatesController;
use App\Http\Controllers\evaluationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('candidate',candidatesController::class);
Route::resource('evaluation',evaluationsController::class);