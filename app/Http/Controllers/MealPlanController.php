<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Meal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
    {
        $diets = Diet::all();
        return view('mealplan.index', compact('diets'));
    }

public function generate(Request $request)
{
    $request->validate([
        'diet_id' => 'required|exists:diets,id',
    ]);

    $diet = Diet::findOrFail($request->diet_id);

    $meals = Meal::with('food')
        ->whereHas('food', fn ($q) => $q->where('diet_id', $diet->id))
        ->get()
        ->groupBy('meal_type');

    $totals = [
        'calories' => $meals->flatten()->sum->calories,
        'protein'  => $meals->flatten()->sum->protein,
        'carbs'    => $meals->flatten()->sum->carbs,
        'fats'     => $meals->flatten()->sum->fats,
    ];

    return view('mealplan.result', compact('diet', 'meals', 'totals'));
}


public function exportPdf(Diet $diet)
{
    $meals = Meal::with('food')
        ->whereHas('food', fn ($q) => $q->where('diet_id', $diet->id))
        ->get()
        ->groupBy('meal_type');

    $totals = [
        'calories' => $meals->flatten()->sum->calories,
        'protein'  => $meals->flatten()->sum->protein,
        'carbs'    => $meals->flatten()->sum->carbs,
        'fats'     => $meals->flatten()->sum->fats,
    ];

    $pdf = Pdf::loadView('mealplan.pdf', compact('diet', 'meals', 'totals'));

    return $pdf->download($diet->name . '_meal_plan.pdf');
}

}
