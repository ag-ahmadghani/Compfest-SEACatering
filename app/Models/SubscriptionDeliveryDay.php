<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;

// SubscriptionDeliveryDay.php
class SubscriptionDeliveryDay extends Model
{
    protected $fillable = ['subscription_id', 'day'];

    public function Subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }
}
