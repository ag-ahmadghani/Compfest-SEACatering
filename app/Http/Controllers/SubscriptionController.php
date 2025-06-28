<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MealPlan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        if (Auth::user()->role === 'admin') {
            $subscriptions = Subscription::with(['user', 'mealPlan', 'mealTypes', 'deliveryDays'])->get();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
        }else {
            $subscriptions = Subscription::with(['user', 'mealPlan', 'mealTypes', 'deliveryDays'])->where('user_id', $id)->get();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
        }
        
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'meal_types' => 'required|array|min:1',
            'meal_types.*' => 'in:breakfast,lunch,dinner',
            'delivery_days' => 'required|array|min:1',
            'delivery_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'allergies' => 'nullable|string'
        ]);

        $mealPlan = MealPlan::find($validated['meal_plan_id']);
        $mealCount = count($validated['meal_types']);
        $dayCount = count($validated['delivery_days']);
        $totalPrice = $mealPlan->price * $mealCount * $dayCount * 4.3;
        $validated['status'] = $validated['status'] ?? 'active';
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addDays(30);

        $subscription = Subscription::create([
            'user_id' => auth()->id(),
            'meal_plan_id' => $validated['meal_plan_id'],
            'name' => auth()->user()->name,
            'phone' => auth()->user()->phone_number,
            'allergies' => $validated['allergies'],
            'total_price' => $totalPrice,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active'
        ]);

        foreach ($validated['meal_types'] as $type) {
            $subscription->mealTypes()->create(['meal_type' => $type]);
        }

        foreach ($validated['delivery_days'] as $day) {
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
        if (auth()->user()->role !== 'admin' && $subscription->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:active,paused,cancelled',
            'meal_types' => 'required|array|min:1',
            'meal_types.*' => 'in:breakfast,lunch,dinner',
            'delivery_days' => 'required|array|min:1',
            'delivery_days.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'allergies' => 'nullable|string'
        ]);

        $mealPlan = MealPlan::find($validated['meal_plan_id']);
        $mealCount = count($validated['meal_types']);
        $dayCount = count($validated['delivery_days']);
        $totalPrice = $mealPlan->price_per_meal * $mealCount * $dayCount * 4.3;

        $subscription->update([
            'user_id' => $validated['user_id'],
            'meal_plan_id' => $validated['meal_plan_id'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'allergies' => $validated['allergies'],
            'total_price' => $totalPrice,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'status' => $validated['status']
        ]);

        $subscription->mealTypes()->delete();
        foreach ($validated['meal_types'] as $type) {
            $subscription->mealTypes()->create(['meal_type' => $type]);
        }

        $subscription->deliveryDays()->delete();
        foreach ($validated['delivery_days'] as $day) {
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