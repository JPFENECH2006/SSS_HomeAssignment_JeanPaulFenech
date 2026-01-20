<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Diet;
use App\Services\FoodApiService;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $query = Food::with('diet');

        if ($request->filled('order')) {
            if (in_array($request->order, ['protein', 'carbs', 'fats'])) {
                $query->orderByDesc($request->order);
            }
        }

        $foods = $query->get();
        return view('foods.index', compact('foods'));
    }

    public function create()
    {
        $diets = Diet::all();
        return view('foods.create', compact('diets'));
    }

    public function store(Request $request, FoodApiService $foodApi)
    {
        // Step 1: Validate user input
        $data = $request->validate([
            'diet_id' => 'required|exists:diets,id',
            'name'    => 'required|string|max:255',
        ]);

        // Step 2: Fetch nutrition from external API
        $nutrition = $foodApi->fetchNutrition($data['name']);

        // Step 3: Handle food not found OR nutrition missing
        if ($nutrition === null) {
            return back()
                ->withErrors([
                    'name' => 'Food not found or nutritional data is unavailable.',
                ])
                ->withInput();
        }

        // Step 4: Store combined data
        Food::create(array_merge($data, $nutrition));

        return redirect()
            ->route('foods.index')
            ->with('success', 'Food added successfully');
    }

    public function show(Food $food)
    {
        $food->load('diet', 'meals');
        return view('foods.show', compact('food'));
    }

    public function edit(Food $food)
    {
        $diets = Diet::all();
        return view('foods.edit', compact('food', 'diets'));
    }

    public function update(Request $request, Food $food)
    {
        $data = $request->validate([
            'diet_id'  => 'required|exists:diets,id',
            'name'     => 'required|string|max:255',
            'calories' => 'required|numeric',
            'protein'  => 'required|numeric',
            'carbs'    => 'required|numeric',
            'fats'     => 'required|numeric',
        ]);

        $food->update($data);

        return redirect()
            ->route('foods.index')
            ->with('success', 'Food updated successfully');
    }

    public function destroy(Food $food)
    {
        $food->delete();

        return redirect()
            ->route('foods.index')
            ->with('success', 'Food deleted successfully');
    }
}
