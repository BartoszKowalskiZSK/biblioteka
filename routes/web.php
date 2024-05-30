<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
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

//MESSAGE CR
Route::post('/store-message', [MessageController::class, 'store'])->name('message.store');
Route::get('/today', [MessageController::class, 'readToday'])->name('message.read.today');

//User
Route::middleware(['auth','privillages:1'])->group(function()
{
    //CART CRUD
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/add/{productId}', [RentController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove/{productId}', [RentController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/rent', [RentController::class, 'rent'])->name('cart.rent');
    //Rents
    Route::get('/your-books', [RentController::class, 'actualRents'])->name('rents.read');
});

//Worker
Route::middleware(['auth','privillages:5'])->group(function()
{
    //Book CRUD
    Route::get('/books', [BookController::class, 'read'])->name('books.read');
    Route::get('/store-book', function(){
        return view('book-add');
    });

    Route::post('/store-book', [BookController::class, 'store'])->name('book.store');
    //Authors CRUD
    Route::get('/authors', [RentController::class, 'read'])->name('authors.all');
    Route::get('/authors/delete/{authorID}', [AuthorController::class, 'delete'])->name('delete.author');
    Route::get('/authors/add', function(){
        return view('author-add');
    });
    Route::post('/authors/add', [AuthorController::class, 'store'])->name('author.store');
    //Rent CRUD
    Route::get('/rents', [RentController::class, 'actualRentsAll'])->name('rents.all');
    Route::get('/rents/delete/{rentID}', [RentController::class, 'softDelete'])->name('rents.delete');
    //Messages RD
    Route::get('/messages/all', [MessageController::class, 'readAll'])->name('message.read.all');
    Route::get('/messages/today', [MessageController::class, 'readToday'])->name('message.read.today');
    Route::get('/messages/delete/{messageID}', [MessageController::class, 'delete'])->name('message.delete');
});

Route::middleware(['auth','privillages:10'])->group(function(){
   Route::get('/users', [UserController::class, 'read']);
   Route::get('/users/set1/{userId}', [UserController::class, 'set1']); 
   Route::get('/users/set5/{userId}', [UserController::class, 'set5']); 
   Route::get('/users/set10/{userId}', [UserController::class, 'set10']); 
});