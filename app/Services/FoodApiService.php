<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FoodApiService
{
    public function fetchNutrition(string $foodName): ?array
    {
        $response = Http::get(
            'https://world.openfoodfacts.org/cgi/search.pl',
            [
                'search_terms'  => $foodName,
                'search_simple' => 1,
                'action'        => 'process',
                'json'          => 1,
                'page_size'     => 1,
            ]
        );

        // API failed or no products returned
        if (!$response->ok() || empty($response['products'])) {
            return null;
        }

        $nutriments = $response['products'][0]['nutriments'] ?? [];

        // REQUIRED nutrition fields (database columns are NOT nullable)
        $requiredKeys = [
            'energy-kcal_100g',
            'proteins_100g',
            'carbohydrates_100g',
            'fat_100g',
        ];

        // If ANY required value is missing → reject
        foreach ($requiredKeys as $key) {
            if (!isset($nutriments[$key])) {
                return null;
            }
        }

        return [
            'calories' => $nutriments['energy-kcal_100g'],
            'protein'  => $nutriments['proteins_100g'],
            'carbs'    => $nutriments['carbohydrates_100g'],
            'fats'     => $nutriments['fat_100g'],
        ];
    }
}
