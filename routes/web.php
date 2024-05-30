<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RentController;
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


Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/books', function(){
    return view('books');
})->name('books');

Route::get('/your-books', function(){
    return view('your-books');
})->name('your-books');

//Message
Route::post('/store-message', [MessageController::class, 'store'])->name('message.store');
Route::get('/today', [MessageController::class, 'readToday'])->name('message.read.today');
Route::get('/all', [MessageController::class, 'readAll'])->name('message.read.all');

//Book
Route::post('/store-book', [BookController::class, 'store'])->name('book.store');
Route::get('/books', [BookController::class, 'read'])->name('books.read');


//Your rents




//Cart
Route::middleware(['auth','privillages:1'])->group(function()
{
    Route::get('/add/{productId}', [RentController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove/{productId}', [RentController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/rent', [RentController::class, 'rent'])->name('cart.rent');
    Route::get('/your-books', [RentController::class, 'read'])->name('rents.read');
});

Route::middleware(['auth','privillages:5'])->group(function()
{
    Route::post('/store-book', [BookController::class, 'store'])->name('book.store');
    Route::get('/rents', [RentController::class, 'actualRents'])->name('rents.all');
});