<?php
// Subscription.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at'
    ];
    
    // OR for Laravel 7+ (better approach)
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    
    protected $attributes = [
        'status' => 'active'
    ];

    protected $fillable = [
        'user_id',
        'meal_plan_id',
        'name',
        'phone',
        'allergies',
        'total_price',
        'start_date',
        'end_date',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mealPlan(): BelongsTo
    {
        return $this->belongsTo(MealPlan::class);
    }

    public function mealTypes()
    {
        return $this->hasMany(SubscriptionMealType::class);
    }

    public function deliveryDays()
    {
        return $this->hasMany(SubscriptionDeliveryDay::class);
    }
    
    public function calculateTotalPrice(): float
    {
        $mealCount = $this->mealTypes()->count();
        $dayCount = $this->deliveryDays()->count();
        
        return $this->mealPlan->price_per_meal * $mealCount * $dayCount * 4.3;
    }
}