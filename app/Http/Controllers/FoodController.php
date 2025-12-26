<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Diet;
use App\Services\FoodApiService;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::with('diet')->get();
        return view('foods.index', compact('foods'));
    }

    public function create()
    {
        $diets = Diet::all();
        return view('foods.create', compact('diets'));
    }

    public function store(Request $request, FoodApiService $foodApi)
    {
        $data = $request->validate([
            'diet_id' => 'required|exists:diets,id',
            'name'    => 'required|string|max:255',
        ]);

        $nutrition = $foodApi->fetchNutrition($data['name']);

        if (!$nutrition) {
            return back()->withErrors([
                'name' => 'Food not found in external nutrition database',
            ]);
        }

        Food::create(array_merge($data, $nutrition));

        return redirect()->route('foods.index');
    }

    public function edit(Food $food)
    {
        $diets = Diet::all();
        return view('foods.edit', compact('food', 'diets'));
    }

    public function update(Request $request, Food $food)
    {
        $data = $request->validate([
            'diet_id' => 'required|exists:diets,id',
            'name'    => 'required|string|max:255',
            'calories'=> 'nullable|numeric',
            'protein' => 'nullable|numeric',
            'carbs'   => 'nullable|numeric',
            'fats'    => 'nullable|numeric',
        ]);

        $food->update($data);

        return redirect()->route('foods.index');
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('foods.index');
    }
}

