<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\ProductsController;
use App\Http\Controllers\Public\CareerController;
use App\Http\Controllers\Public\SalesController;
use App\Http\Controllers\Public\PartnersController;
use App\Http\Controllers\ContactController;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');

Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/career', [CareerController::class, 'index'])->name('career');
Route::get('/contact', [SalesController::class, 'index'])->name('contact');
Route::get('/partners', [PartnersController::class, 'index'])->name('partners');

Route::post('/contact-submit', [ContactController::class, 'store'])
    ->middleware('throttle:10,1') // maksimal 10 kiriman per menit per IP (anti-spam)
    ->name('contact.submit');