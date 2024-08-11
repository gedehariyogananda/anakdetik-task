<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'login')->name('loginPost');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('/book', 'index')->name('book');
        Route::get('/book/filter/{category}', 'filter')->name('book.filter');
        Route::post('/book', 'store')->name('book.store');
        Route::put('/book/{id}', 'update')->name('book.update');
        Route::delete('/book/{id}', 'destroy')->name('book.destroy');

        // download 
        Route::get('/book/download/filebuku/{id}', 'downloadFileBuku')->name('book.downloadfilebuku');
        Route::get('/book/download/coverbuku/{id}', 'downloadcoverbuku')->name('book.downloadcoverbuku');

        // export excel 
        Route::get('/book/export/excel', 'exportExcel')->name('book.exportexcel');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/show/{id}', 'show')->name('category.show');
        Route::post('/category', 'store')->name('category.store');
        Route::put('/category/{id}', 'update')->name('category.update');
        Route::delete('/category/{id}', 'destroy')->name('category.destroy');
    });
});
