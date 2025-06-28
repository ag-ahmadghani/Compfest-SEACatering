<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// SubscriptionMealType.php
class SubscriptionMealType extends Model
{
    protected $fillable = ['subscription_id', 'meal_type'];

    public function Subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
