<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Profile (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BMI Feature (Phase 4)
    Route::get('/bmi', [BmiController::class, 'index'])->name('bmi.index');
    Route::post('/bmi/calculate', [BmiController::class, 'calculate'])->name('bmi.calculate');

    // ===== PHASE 5: CRUD =====

    // Diets CRUD
    Route::resource('diets', DietController::class);

    // Foods CRUD (belongs to Diet)
    Route::resource('foods', FoodController::class);

    // Meals CRUD (belongs to Food)
    Route::resource('meals', MealController::class);
});

require __DIR__.'/auth.php';

