<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Frontend\FoodController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Admin\ReservationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/food/{slug}', [FoodController::class, 'show'])->name('food.show');

    Route::get('/booking/step-one', [BookingController::class, 'stepOne'])->name('booking.step.one');
    Route::post('/booking/step-one', [BookingController::class, 'storeStepOne'])->name('booking.store.step.one');

    Route::get('/booking/step-two', [BookingController::class, 'stepTwo'])->name('booking.step.two');
    Route::post('/booking/step-two', [BookingController::class, 'storeStepTwo'])->name('booking.store.step.two');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/destroy/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('/cart/update/{cart}/edit', [CartController::class, 'update'])->name('cart.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::view('/about', 'about')->name('about');
});

Route::middleware('admin')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::put('/{order}/edit', [AdminController::class, 'update'])->name('edit');
    Route::delete('/{order}', [AdminController::class, 'destroy'])->name('destroy');

    Route::resource('/menu', MenuController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/table', TableController::class);
    Route::resource('/reservation', ReservationController::class);
});

require __DIR__ . '/auth.php';