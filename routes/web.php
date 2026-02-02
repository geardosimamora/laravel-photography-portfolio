<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Halaman Depan
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route Category Filter
Route::get('/category/{category}', [HomeController::class, 'category'])->name('portfolio.category');

// Route Contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route Portfolio Detail
Route::get('/portfolio/{portfolio:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

