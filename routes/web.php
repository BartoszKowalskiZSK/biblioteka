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
use App\Http\Controllers\InfoController;
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





Route::get('/admin', function(){
    return view('admin');
})->name('admin');


Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::get('/author-add', function(){
    return view('author-add');
})->name('author-add');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');



Route::get('/', [InfoController::class, 'read'])->name('welcome');
Route::post('/admin/info/edit', [InfoController::class, 'edit'])->name('info.edit');
Route::post('/edit', [InfoController::class, 'edit'])->name('info.edit');

Route::get('/your-books', function(){
    return view('your-books');
})->name('your-books');


Route::get('/books/{bookId}', [BookController::class, 'book'])->name('book.page');
Route::get('/books', [BookController::class, 'read'])->name('books.read');

//MESSAGE CR
Route::post('/store-message', [MessageController::class, 'store'])->name('message.store');


//User
Route::middleware(['auth','privillages:1'])->group(function()
{
    //CART CRUD
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::get('/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/rent', [CartController::class, 'rent'])->name('cart.rent');
    //Rents
    Route::get('/your-books', [RentController::class, 'actualRents'])->name('rents.read');
});

//Worker
Route::middleware(['auth','privillages:5'])->group(function()
//zmienic pozniej na 5
{
    //Book CRUD
    
    Route::get('/store-book', [BookController::class, 'add'])->name('book.add');
    Route::post('/books/create', [BookController::class, 'store'])->name('book.store');

    //Authors CRUD
    Route::get('/authors', [AuthorController::class, 'read'])->name('authors.all');
    Route::get('/authors/delete/{authorID}', [AuthorController::class, 'delete'])->name('delete.author');
    Route::get('/authors/add', function(){
        return view('author-add');
    });
    Route::post('/authors/add', [AuthorController::class, 'store'])->name('authors.store');
    //Rent CRUD
    Route::get('/rents', [RentController::class, 'actualRentsAll'])->name('rents.all');
    Route::get('/rents/delete/{rentID}', [RentController::class, 'softDelete'])->name('rents.delete');
    //Messages RD
    Route::get('/messages/all', [MessageController::class, 'readAll'])->name('message.read.all');
    Route::get('/messages/delete/{messageID}', [MessageController::class, 'delete'])->name('message.delete');
});


//WORKER-ADMIN
Route::middleware(['auth','privillages:10'])->group(function(){
    //zmienic priv na 10 pozniej
   Route::get('/users', [UserController::class, 'read']);
   Route::get('/users/set1/{userId}', [UserController::class, 'set1']); 
   Route::get('/users/set5/{userId}', [UserController::class, 'set5']); 
   Route::get('/users/set10/{userId}', [UserController::class, 'set10']); 
});