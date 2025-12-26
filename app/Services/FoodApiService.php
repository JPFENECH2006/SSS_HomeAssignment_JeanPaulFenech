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
                'search_terms' => $foodName,
                'search_simple' => 1,
                'action' => 'process',
                'json' => 1,
                'page_size' => 1,
            ]
        );

        if (!$response->ok() || empty($response['products'])) {
            return null;
        }

        $product = $response['products'][0];

        return [
            'calories' => $product['nutriments']['energy-kcal_100g'] ?? null,
            'protein'  => $product['nutriments']['proteins_100g'] ?? null,
            'carbs'    => $product['nutriments']['carbohydrates_100g'] ?? null,
            'fats'     => $product['nutriments']['fat_100g'] ?? null,
        ];
    }
}
