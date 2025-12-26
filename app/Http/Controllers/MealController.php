<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Food;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::with('food')->get();
        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        $foods = Food::all();
        return view('meals.create', compact('foods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'food_id' => 'required|exists:foods,id',
            'meal_type' => 'required|string',
            'portion_size' => 'required|string',
        ]);

        Meal::create($data);

        return redirect()->route('meals.index');
    }

    public function edit(Meal $meal)
    {
        $foods = Food::all();
        return view('meals.edit', compact('meal', 'foods'));
    }

    public function update(Request $request, Meal $meal)
    {
        $data = $request->validate([
            'food_id' => 'required|exists:foods,id',
            'meal_type' => 'required|string',
            'portion_size' => 'required|string',
        ]);

        $meal->update($data);

        return redirect()->route('meals.index');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('meals.index');
    }
}

