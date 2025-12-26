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
                'search_terms'   => $foodName,
                'search_simple'  => 1,
                'action'         => 'process',
                'json'           => 1,
                'page_size'      => 1,
            ]
        );

        if (!$response->ok() || empty($response['products'])) {
            return null;
        }

        $product = $response['products'][0];
        $nutriments = $product['nutriments'] ?? [];

        return [
            // Energy
            'calories' => $nutriments['energy-kcal_100g'] ?? 0,

            // Macros (ALWAYS default to 0, never null)
            'protein'  => $nutriments['proteins_100g'] ?? 0,
            'carbs'    => $nutriments['carbohydrates_100g'] ?? 0,
            'fats'     => $nutriments['fat_100g'] ?? 0,
        ];
    }
}
