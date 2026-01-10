<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index(Request $request)
    {
        $query = Diet::query();

        if ($request->filled('order')) {
            if ($request->order === 'bmi_low') {
                $query->orderBy('min_bmi');
            }

            if ($request->order === 'bmi_high') {
                $query->orderByDesc('max_bmi');
            }
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
            'max_bmi' => 'required|numeric|gte:min_bmi',
        ]);

        Diet::create($data);

        return redirect()
            ->route('diets.index')
            ->with('success', 'Diet added successfully');
    }

    public function show(Diet $diet)
    {
        $diet->load('foods');
        return view('diets.show', compact('diet'));
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
            'max_bmi' => 'required|numeric|gte:min_bmi',
        ]);

        $diet->update($data);

        return redirect()
            ->route('diets.index')
            ->with('success', 'Diet updated successfully');
    }

    public function destroy(Diet $diet)
    {
        $diet->delete();

        return redirect()
            ->route('diets.index')
            ->with('success', 'Diet deleted successfully');
    }
}
