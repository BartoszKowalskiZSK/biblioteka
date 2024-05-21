<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';



Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/your-books', function () {
    return view('your-books');
})->name('your-books');

Route::get('/rent-books', function () {
    return view('rent-books');
})->middleware('auth')->name('rent-books');

Route::get('/add-book', function () {
    return view('add-book');
})->middleware('auth');
