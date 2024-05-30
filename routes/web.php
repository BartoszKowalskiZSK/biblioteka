<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Book;

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



Route::get('/welcome', function(){
    return view('welcome');
})->name('welcome');

Route::get('/register', function(){
    return view('register');
})->name('register');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/books', function(){
    return view('books');
})->name('books');

Route::middleware(['auth','privillages:5'])->group(function () {
    Route::get('your-rents', function(){
        return view('your-rents');
    })->name('your-rents');

    Route::get('/cart', function(){
        return view('cart');
    })->name('cart');

});




