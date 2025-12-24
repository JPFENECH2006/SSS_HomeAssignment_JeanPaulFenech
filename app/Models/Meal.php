<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meal extends Model
{
    protected $fillable = [
        'food_id',
        'meal_type',
        'portion_size',
    ];

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
