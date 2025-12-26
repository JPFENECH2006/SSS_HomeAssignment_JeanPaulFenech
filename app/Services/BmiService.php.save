<?php

namespace App\Services;

class BmiService
{
    public function calculate(float $heightCm, float $weightKg): float
    {
        $heightM = $heightCm / 100;
        return round($weightKg / ($heightM * $heightM), 2);
    }

    public function category(float $bmi): string
    {
        return match (true) {
            $bmi < 18.5 => 'Underweight',
            $bmi < 25   => 'Normal',
            $bmi < 30   => 'Overweight',
            default     => 'Obese',
        };
    }
}
