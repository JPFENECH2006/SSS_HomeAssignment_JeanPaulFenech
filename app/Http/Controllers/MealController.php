<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Food;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(Request $request)
    {
        $query = Meal::with('food.diet');

        if ($request->filled('order')) {
            $query->orderBy('meal_type');
        }

        $meals = $query->get();
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
            'meal_type' => 'required|in:Breakfast,Lunch,Dinner',
            'portion_size' => 'required|integer|min:1',
        ]);

        Meal::create($data);

        return redirect()
            ->route('meals.index')
            ->with('success', 'Meal added successfully');
    }

    public function show(Meal $meal)
    {
        $meal->load('food.diet');
        return view('meals.show', compact('meal'));
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
            'meal_type' => 'required|in:Breakfast,Lunch,Dinner',
            'portion_size' => 'required|integer|min:1',
        ]);

        $meal->update($data);

        return redirect()
            ->route('meals.index')
            ->with('success', 'Meal updated successfully');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()
            ->route('meals.index')
            ->with('success', 'Meal deleted successfully');
    }
}
