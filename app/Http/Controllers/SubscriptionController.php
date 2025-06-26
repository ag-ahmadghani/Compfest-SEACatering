<?php
namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\MealPlan;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'mealPlan'])->get();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::all();
        $mealPlans = MealPlan::where('status', 'active')->get();
        return view('dashboard.subscriptions.create', compact('users', 'mealPlans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:active,paused,cancelled',
            'meal_types' => 'required|array',
            'meal_types.*' => 'in:breakfast,lunch,dinner',
            'delivery_days' => 'required|array',
            'delivery_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'
        ]);

        $subscription = Subscription::create($request->only([
            'user_id', 'meal_plan_id', 'start_date', 'end_date', 'status'
        ]));

        foreach ($request->meal_types as $type) {
            $subscription->mealTypes()->create(['meal_type' => $type]);
        }

        foreach ($request->delivery_days as $day) {
            $subscription->deliveryDays()->create(['day' => $day]);
        }

        return redirect()->route('dashboard.subscriptions.index')
            ->with('success', 'Subscription created successfully.');
    }

    public function edit(Subscription $subscription)
    {
        $users = User::all();
        $mealPlans = MealPlan::where('status', 'active')->get();
        return view('dashboard.subscriptions.edit', compact('subscription', 'users', 'mealPlans'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:active,paused,cancelled',
            'meal_types' => 'required|array',
            'meal_types.*' => 'in:breakfast,lunch,dinner',
            'delivery_days' => 'required|array',
            'delivery_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'
        ]);

        $subscription->update($request->only([
            'user_id', 'meal_plan_id', 'start_date', 'end_date', 'status'
        ]));

        $subscription->mealTypes()->delete();
        foreach ($request->meal_types as $type) {
            $subscription->mealTypes()->create(['meal_type' => $type]);
        }

        $subscription->deliveryDays()->delete();
        foreach ($request->delivery_days as $day) {
            $subscription->deliveryDays()->create(['day' => $day]);
        }

        return redirect()->route('dashboard.subscriptions.index')
            ->with('success', 'Subscription updated successfully.');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('dashboard.subscriptions.index')
            ->with('success', 'Subscription deleted successfully.');
    }
}