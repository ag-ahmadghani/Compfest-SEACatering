<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('meal_plan_id')->constrained();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['active', 'paused', 'cancelled'])->default('active');
            $table->timestamps();
        });
        
        Schema::create('subscription_meal_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained();
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner']);
            $table->timestamps();
        });
        
        Schema::create('subscription_delivery_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained();
            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_delivery_days');
        Schema::dropIfExists('subscription_meal_types');
        Schema::dropIfExists('subscriptions');
    }
};