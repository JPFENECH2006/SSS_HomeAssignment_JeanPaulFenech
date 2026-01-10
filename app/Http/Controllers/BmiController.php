<?php

namespace App\Http\Controllers;

use App\Models\Bmi;
use App\Models\Diet;
use App\Services\BmiService;
use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function index()
    {
        $recommendedDiet = null;

        if (session()->has('recommended_diet_id')) {
            $recommendedDiet = Diet::find(session('recommended_diet_id'));
        }

        return view('bmi.index', compact('recommendedDiet'));
    }

    public function calculate(Request $request, BmiService $bmiService)
    {
        // Validate input: must be filled and numeric
        $data = $request->validate([
            'height_cm' => ['required', 'numeric'],
            'weight_kg' => ['required', 'numeric'],
        ], [
            'height_cm.required' => 'Please enter your height.',
            'height_cm.numeric' => 'Height must be a number.',
            'weight_kg.required' => 'Please enter your weight.',
            'weight_kg.numeric' => 'Weight must be a number.',
        ]);

        // Calculate BMI
        $bmiValue = $bmiService->calculate($data['height_cm'], $data['weight_kg']);
        $category = $bmiService->category($bmiValue);

        // Update user data
        $user = $request->user();
        $user->update($data);

        // Save or update BMI record
        Bmi::updateOrCreate(
            ['user_id' => $user->id],
            [
                'bmi_value' => round($bmiValue, 2),
                'category'  => $category,
            ]
        );

        // Find recommended diet for this BMI
        $suggestedDiet = Diet::where('min_bmi', '<=', $bmiValue)
            ->where('max_bmi', '>=', $bmiValue)
            ->first();

        // Redirect back with success message and diet ID
        return redirect()
            ->route('bmi.index')
            ->with('success', 'BMI calculated successfully')
            ->with('recommended_diet_id', optional($suggestedDiet)->id);
    }
}
