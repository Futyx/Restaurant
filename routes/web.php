<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderingController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('order', [OrderController::class, 'index'])->name('order');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('about', [AboutUsController::class, 'index'])->name('about');
Route::get('contact', [AboutUsController::class, 'index'])->name('contact');
Route::get('menu', [MenuController::class, 'index'])->name('menu');
Route::get('order', [OrderController::class, 'index'])->name('order');

Route::get('/tguid', function () {
    return view('tailwind.guid');
});

require __DIR__.'/auth.php';
