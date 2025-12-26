<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index(Request $request)
    {
        $query = Diet::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by logged-in user's BMI (if exists)
        if (auth()->check() && auth()->user()->bmi) {
            $bmi = auth()->user()->bmi->bmi_value;

            $query->where('min_bmi', '<=', $bmi)
                  ->where('max_bmi', '>=', $bmi);
        }

        $diets = $query->get();

        return view('diets.index', compact('diets'));
    }

    public function create()
    {
        return view('diets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'min_bmi' => 'required|numeric',
            'max_bmi' => 'required|numeric',
        ]);

        Diet::create($data);

        return redirect()->route('diets.index');
    }

    public function edit(Diet $diet)
    {
        return view('diets.edit', compact('diet'));
    }

    public function update(Request $request, Diet $diet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'min_bmi' => 'required|numeric',
            'max_bmi' => 'required|numeric',
        ]);

        $diet->update($data);

        return redirect()->route('diets.index');
    }

    public function destroy(Diet $diet)
    {
        $diet->delete();
        return redirect()->route('diets.index');
    }
}
