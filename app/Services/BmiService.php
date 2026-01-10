<?php

namespace App\Services;

class BmiService
{
    /**
     * Calculate BMI given height in cm and weight in kg
     */
    public function calculate($height_cm, $weight_kg)
    {
        $height_m = $height_cm / 100; // convert cm to meters
        return $weight_kg / ($height_m ** 2);
    }

    /**
     * Determine BMI category
     */
    public function category($bmi)
    {
        if ($bmi < 18.5) return 'Underweight';
        if ($bmi < 25) return 'Normal';
        if ($bmi < 30) return 'Overweight';
        if ($bmi < 35) return 'Obesity I';
        if ($bmi < 40) return 'Obesity II';
        return 'Obesity III';
    }
}
