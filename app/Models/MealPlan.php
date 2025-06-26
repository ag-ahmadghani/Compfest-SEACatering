<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'description',
        'price',
        'type',
        'status',
        'image'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}