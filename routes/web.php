<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealPlanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {

    // Profile 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BMI Feature
    Route::get('/bmi', [BmiController::class, 'index'])->name('bmi.index');
    Route::post('/bmi/calculate', [BmiController::class, 'calculate'])->name('bmi.calculate');

    // ===== PHASE 5: CRUD =====

    // Diets CRUD
    Route::resource('diets', DietController::class);

    // Foods CRUD
    Route::resource('foods', FoodController::class);

    // Meals CRUD
    Route::resource('meals', MealController::class);

    // ===== MEAL PLAN GENERATOR (SEARCH + PDF) =====
    Route::get('/meal-plan', [MealPlanController::class, 'index'])->name('mealplan.index');
    Route::post('/meal-plan', [MealPlanController::class, 'generate'])->name('mealplan.generate');
    Route::get('/meal-plan/pdf/{diet}', [MealPlanController::class, 'exportPdf'])->name('mealplan.pdf');
});

require __DIR__.'/auth.php';
