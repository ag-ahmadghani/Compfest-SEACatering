<x-admin title="Dashboard">
    <div x-data="dashboardStats" class="space-y-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Total Users</p>
                        <h3 class="text-2xl font-bold dark:text-white">1,248</h3>
                        <p class="text-green-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            <span>12.5% from last month</span>
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Active Subscriptions</p>
                        <h3 class="text-2xl font-bold dark:text-white">856</h3>
                        <p class="text-green-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            <span>8.3% from last month</span>
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Meal Plans Active</p>
                        <h3 class="text-2xl font-bold dark:text-white">4</h3>
                        <p class="text-gray-500 dark:text-gray-400">Total options</p>
                    </div>
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Monthly Revenue</p>
                        <h3 class="text-2xl font-bold dark:text-white">Rp 128,500,000</h3>
                        <p class="text-green-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            <span>15.2% from last month</span>
                        </p>
                    </div>
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <h3 class="text-lg font-medium mb-4 dark:text-white">User Growth</h3>
                <canvas id="userGrowthChart" height="250"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <h3 class="text-lg font-medium mb-4 dark:text-white">Meal Plan Distribution</h3>
                <canvas id="mealPlanDistributionChart" height="250"></canvas>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800">
            <div class="px-6 py-4 border-b dark:border-gray-700">
                <h3 class="text-lg font-medium dark:text-white">Recent Subscriptions</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Plan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Start Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Status
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold">
                                        A
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">Andi Wijaya</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">andi@example.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">Premium Weekly</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Weight Loss</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                Jun 15, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-green-600 hover:text-green-900">View</a>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t dark:border-gray-700 flex items-center justify-between">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> results
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        Previous
                    </button>
                    <button class="px-3 py-1 rounded-md bg-green-600 text-white">
                        1
                    </button>
                    <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        2
                    </button>
                    <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin>