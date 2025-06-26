<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlan::all();
        return view('dashboard.meal-plans.index', compact('mealPlans'));
    }

    public function public_show()
    {
        $mealPlans = MealPlan::all();
        return view('menu', compact('mealPlans'));
    }

    public function create()
    {
        return view('dashboard.meal-plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:standard,premium,special',
            'status' => 'required|in:draft,active',
            'image' => 'nullable|url'
        ]);

        MealPlan::create($request->all());

        return redirect()->route('dashboard.meal-plans.index')
            ->with('success', 'Meal plan created successfully.');
    }

    public function edit(MealPlan $mealPlan)
    {
        return view('dashboard.meal-plans.edit', compact('mealPlan'));
    }

    public function update(Request $request, MealPlan $mealPlan)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:standard,premium,special',
            'status' => 'required|in:draft,active',
            'image' => 'nullable|url'
        ]);

        $mealPlan->update($request->all());

        return redirect()->route('dashboard.meal-plans.index')
            ->with('success', 'Meal plan updated successfully.');
    }

    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();
        return redirect()->route('dashboard.meal-plans.index')
            ->with('success', 'Meal plan deleted successfully.');
    }
}