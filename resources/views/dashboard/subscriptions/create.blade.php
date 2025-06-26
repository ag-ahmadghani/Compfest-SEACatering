<x-admin title="Create Subscription">
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold dark:text-white">Create New Subscription</h2>
            <a href="{{ route('dashboard.subscriptions.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
            <form action="{{ route('dashboard.subscriptions.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer*</label>
                        <select id="user_id" name="user_id" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="meal_plan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meal Plan*</label>
                        <select id="meal_plan_id" name="meal_plan_id" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            @foreach($mealPlans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->plan_name }} (Rp {{ number_format($plan->price, 0) }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date*</label>
                            <input type="date" id="start_date" name="start_date" required
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        </div>

                        <div>
                            <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date</label>
                            <input type="date" id="end_date" name="end_date"
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status*</label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            <option value="active">Active</option>
                            <option value="paused">Paused</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meal Types*</label>
                        <div class="flex flex-wrap gap-3">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="meal_types[]" value="breakfast" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <span class="ml-2">Breakfast</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="meal_types[]" value="lunch" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <span class="ml-2">Lunch</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="meal_types[]" value="dinner" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <span class="ml-2">Dinner</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delivery Days*</label>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="delivery_days[]" value="{{ $day }}" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                    <span class="ml-2 capitalize">{{ $day }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Create Subscription
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>