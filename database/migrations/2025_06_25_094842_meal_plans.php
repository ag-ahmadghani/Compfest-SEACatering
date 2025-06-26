<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->enum('type', ['standard', 'premium', 'special']);
            $table->enum('status', ['draft', 'active'])->default('draft');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Insert default meal plans
        DB::table('meal_plans')->insert([
            [
                'plan_name' => 'Diet Plan',
                'description' => 'Healthy balanced meals for weight management',
                'price' => 30000,
                'type' => 'standard',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'plan_name' => 'Protein Plan',
                'description' => 'High protein meals for muscle growth',
                'price' => 40000,
                'type' => 'premium',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'plan_name' => 'Royal Plan',
                'description' => 'Premium gourmet meals with special ingredients',
                'price' => 60000,
                'type' => 'special',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('meal_plans');
    }
};