<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('dashboard');
});


Route::resource('book', BookController::class);
Route::resource('student', StudentController::class);
