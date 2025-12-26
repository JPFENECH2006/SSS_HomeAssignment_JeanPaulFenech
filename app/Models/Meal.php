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
}

