<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;

use function Laravel\Prompts\search;

Route::get('/', function () {
    return view('dashboard');
});


Route::resource('book', BookController::class);
Route::resource('student', StudentController::class);
Route::resource('borrow', BorrowController::class);
Route::get('borrow-search', [BorrowController::class, "search"])->name("borrow.search");
Route::post('borrow-search', [BorrowController::class, "search_student"])->name("borrow.search-student");
