<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleBooksController;

Route::apiResource('authors', AuthorController::class);
Route::apiResource('books', BookController::class);

// custom endpoint: all books by specific author
Route::get('/authors/{id}/books', [AuthorController::class, 'books']);
Route::post('/authors', [AuthorController::class, 'store']);

Route::post('/payment/create', [PaymentController::class, 'createTransaction']);
Route::get('/books/search', [GoogleBooksController::class, 'search']);
