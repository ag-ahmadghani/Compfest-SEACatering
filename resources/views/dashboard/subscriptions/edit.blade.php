<x-admin title="Edit Subscription">
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold dark:text-white">Edit Subscription</h2>
            <a href="{{ route('dashboard.subscriptions.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
            <form action="{{ route('dashboard.subscriptions.update', $subscription->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <!-- Customer Field (readonly for users) -->
                    <div>
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer*</label>
                        @if(auth()->user()->role === 'admin')
                            <select id="user_id" name="user_id" required
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $subscription->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" readonly
                                   class="w-full px-4 py-2 border rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600"
                                   value="{{ $subscription->user->name }} ({{ $subscription->user->email }})">
                            <input type="hidden" name="user_id" value="{{ $subscription->user_id }}">
                        @endif
                    </div>

                    <!-- Meal Plan Field -->
                    <div>
                        <label for="meal_plan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meal Plan*</label>
                        <select id="meal_plan_id" name="meal_plan_id" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            @foreach($mealPlans as $plan)
                                <option value="{{ $plan->id }}" {{ $subscription->meal_plan_id == $plan->id ? 'selected' : '' }}>
                                    {{ $plan->plan_name }} (Rp {{ number_format($plan->price, 0) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date*</label>
                            <input type="date" id="start_date" name="start_date" 
                                   value="{{ old('start_date', $subscription->start_date->format('Y-m-d')) }}" required
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        </div>

                        <div>
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                            <input type="date" id="end_date" name="end_date" 
                                   value="{{ old('end_date', $subscription->end_date?->format('Y-m-d')) }}"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </div>

                    <!-- Status Field (modified for users) -->
                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status*</label>
                        @if(auth()->user()->role === 'admin')
                            <select id="status" name="status" required
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                                <option value="active" {{ $subscription->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ $subscription->status == 'paused' ? 'selected' : '' }}>Paused</option>
                                <option value="cancelled" {{ $subscription->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        @else
                            <select id="status" name="status" required
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                                <option value="active" {{ $subscription->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ $subscription->status == 'paused' ? 'selected' : '' }}>Paused</option>
                            </select>
                        @endif
                    </div>

                    <!-- Meal Types -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meal Types*</label>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['breakfast', 'lunch', 'dinner'] as $type)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="meal_types[]" value="{{ $type }}" 
                                           {{ in_array($type, $subscription->mealTypes->pluck('meal_type')->toArray()) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                    <span class="ml-2 capitalize">{{ $type }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Delivery Days -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delivery Days*</label>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="delivery_days[]" value="{{ $day }}" 
                                           {{ in_array($day, $subscription->deliveryDays->pluck('day')->toArray()) ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                    <span class="ml-2 capitalize">{{ $day }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dashboard.subscriptions.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Update Subscription
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>