<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{

        protected $table = 'foods';

    protected $fillable = [
        'diet_id',
        'name',
        'calories',
        'protein',
        'carbs',
        'fats',
    ];

    public function diet(): BelongsTo
    {
        return $this->belongsTo(Diet::class);
    }

    public function meals(): HasMany
    {
        return $this->hasMany(Meal::class);
    }
}
