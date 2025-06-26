<x-admin title="Edit Meal Plan">
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold dark:text-white">Edit Meal Plan</h2>
            <a href="{{ route('dashboard.meal-plans.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
            <form action="{{ route('dashboard.meal-plans.update', $mealPlan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="plan_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan Name*</label>
                        <input type="text" id="plan_name" name="plan_name" value="{{ old('plan_name', $mealPlan->plan_name) }}" required
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description*</label>
                        <textarea id="description" name="description" rows="4" required
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">{{ old('description', $mealPlan->description) }}</textarea>
                    </div>

                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price (Rp)*</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $mealPlan->price) }}" min="0" step="1000" required
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type*</label>
                        <select id="type" name="type" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            <option value="standard" {{ $mealPlan->type === 'standard' ? 'selected' : '' }}>Standard</option>
                            <option value="premium" {{ $mealPlan->type === 'premium' ? 'selected' : '' }}>Premium</option>
                            <option value="special" {{ $mealPlan->type === 'special' ? 'selected' : '' }}>Special</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status*</label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            <option value="draft" {{ $mealPlan->status === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="active" {{ $mealPlan->status === 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>

                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image URL</label>
                        <input type="url" id="image" name="image" value="{{ old('image', $mealPlan->image) }}"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dashobard.meal-plans.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Update Meal Plan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>