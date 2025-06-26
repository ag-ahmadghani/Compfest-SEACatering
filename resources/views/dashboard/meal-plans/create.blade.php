<x-admin title="Create Meal Plan">
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold dark:text-white">Create New Meal Plan</h2>
            <a href="{{ route('dashboard.meal-plans.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
            <form action="{{ route('dashboard.meal-plans.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="plan_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plan Name*</label>
                        <input type="text" id="plan_name" name="plan_name" required
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description*</label>
                        <textarea id="description" name="description" rows="4" required
                                  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600"></textarea>
                    </div>

                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price (Rp)*</label>
                        <input type="number" id="price" name="price" min="0" step="1000" required
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type*</label>
                        <select id="type" name="type" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            <option value="standard">Standard</option>
                            <option value="premium">Premium</option>
                            <option value="special">Special</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status*</label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                            <option value="draft">Draft</option>
                            <option value="active">Active</option>
                        </select>
                    </div>

                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image URL</label>
                        <input type="url" id="image" name="image"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Create Meal Plan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>