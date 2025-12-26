<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'meal_type',
        'portion_size',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function getCaloriesAttribute()
    {
        $calories = (float) ($this->food->calories ?? 0);
        $portion  = (float) ($this->portion_size ?? 0);

        return round(($calories * $portion) / 100, 2);
    }

    public function getProteinAttribute()
    {
        $protein = (float) ($this->food->protein ?? 0);
        $portion = (float) ($this->portion_size ?? 0);

        return round(($protein * $portion) / 100, 2);
    }

    public function getCarbsAttribute()
    {
        $carbs = (float) ($this->food->carbs ?? 0);
        $portion = (float) ($this->portion_size ?? 0);

        return round(($carbs * $portion) / 100, 2);
    }

    public function getFatsAttribute()
    {
        $fats = (float) ($this->food->fats ?? 0);
        $portion = (float) ($this->portion_size ?? 0);

        return round(($fats * $portion) / 100, 2);
    }
}
