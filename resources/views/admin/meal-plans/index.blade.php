<x-admin title="Meal Plans Management">
    <div class="space-y-6" x-data="{
        mealPlans: [
            {
                id: 1,
                name: 'Balanced Lifestyle',
                description: 'Perfect mix of protein, carbs, and healthy fats for maintaining a balanced diet',
                price: 250000,
                type: 'Standard',
                status: 'active',
                subscribers: 142,
                image: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                calories: 450,
                protein: 30,
                carbs: 40,
                fat: 15,
                created_at: '2023-06-15'
            },
            {
                id: 2,
                name: 'Weight Loss',
                description: 'Lower calorie meals designed to help you lose weight while staying satisfied',
                price: 300000,
                type: 'Premium',
                status: 'active',
                subscribers: 98,
                image: 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                calories: 350,
                protein: 35,
                carbs: 25,
                fat: 12,
                created_at: '2023-05-20'
            },
            {
                id: 3,
                name: 'Muscle Gain',
                description: 'High-protein meals to support muscle growth and recovery',
                price: 350000,
                type: 'Premium',
                status: 'active',
                subscribers: 76,
                image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                calories: 550,
                protein: 45,
                carbs: 50,
                fat: 20,
                created_at: '2023-04-10'
            },
            {
                id: 4,
                name: 'Keto Diet',
                description: 'Low-carb, high-fat meals for ketosis',
                price: 320000,
                type: 'Special',
                status: 'draft',
                subscribers: 45,
                image: 'https://images.unsplash.com/photo-1547592180-85f173990554?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                calories: 400,
                protein: 25,
                carbs: 10,
                fat: 30,
                created_at: '2023-07-01'
            }
        ],
        searchQuery: '',
        sortField: 'id',
        sortDirection: 'desc',
        showDeleteModal: false,
        mealPlanToDelete: null,
        showFilters: false,
        filterType: 'all',
        filterStatus: 'all',
        
        get filteredMealPlans() {
            return this.mealPlans
                .filter(plan => {
                    // Search filter
                    const matchesSearch = 
                        plan.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        plan.description.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        plan.type.toLowerCase().includes(this.searchQuery.toLowerCase());
                    
                    // Type filter
                    const matchesType = 
                        this.filterType === 'all' || 
                        plan.type.toLowerCase() === this.filterType.toLowerCase();
                    
                    // Status filter
                    const matchesStatus = 
                        this.filterStatus === 'all' || 
                        plan.status === this.filterStatus;
                    
                    return matchesSearch && matchesType && matchesStatus;
                })
                .sort((a, b) => {
                    let modifier = this.sortDirection === 'asc' ? 1 : -1;
                    
                    if (a[this.sortField] < b[this.sortField]) return -1 * modifier;
                    if (a[this.sortField] > b[this.sortField]) return 1 * modifier;
                    return 0;
                });
        },
        
        sort(field) {
            if (this.sortField === field) {
                this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortField = field;
                this.sortDirection = 'asc';
            }
        },
        
        confirmDelete(plan) {
            this.mealPlanToDelete = plan;
            this.showDeleteModal = true;
        },
        
        deleteMealPlan() {
            this.mealPlans = this.mealPlans.filter(plan => plan.id !== this.mealPlanToDelete.id);
            this.showDeleteModal = false;
            this.mealPlanToDelete = null;
        },
        
        toggleStatus(plan) {
            plan.status = plan.status === 'active' ? 'draft' : 'active';
            // In a real app, you would make an API call here
        }
    }">
        <!-- Header and Actions -->
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold dark:text-white">Meal Plans Management</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Manage all meal plans offered to customers</p>
            </div>
            <div class="flex space-x-3">
                <button @click="showFilters = !showFilters" 
                        class="px-4 py-2 border rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                    Filters
                </button>
                <a href="{{ route('admin.meal-plans.create') }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Plan
                </a>
            </div>
        </div>

        <!-- Filters Panel -->
        <div x-show="showFilters" x-transition class="bg-white rounded-lg shadow p-4 dark:bg-gray-800">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Plan Type</label>
                    <select x-model="filterType" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="all">All Types</option>
                        <option value="Standard">Standard</option>
                        <option value="Premium">Premium</option>
                        <option value="Special">Special</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                    <select x-model="filterStatus" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="all">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Search</label>
                    <div class="relative">
                        <input type="text" x-model="searchQuery" placeholder="Search meal plans..." 
                               class="pl-10 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Total Plans</p>
                        <h3 class="text-2xl font-bold dark:text-white" x-text="mealPlans.length"></h3>
                    </div>
                    <div class="p-3 rounded-full bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Active Plans</p>
                        <h3 class="text-2xl font-bold dark:text-white" x-text="mealPlans.filter(p => p.status === 'active').length"></h3>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Total Subscribers</p>
                        <h3 class="text-2xl font-bold dark:text-white" x-text="mealPlans.reduce((sum, plan) => sum + plan.subscribers, 0)"></h3>
                    </div>
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 dark:bg-purple-900 dark:text-purple-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">Avg. Price</p>
                        <h3 class="text-2xl font-bold dark:text-white">
                            Rp <span x-text="new Intl.NumberFormat('id-ID').format(Math.round(mealPlans.reduce((sum, plan) => sum + plan.price, 0) / mealPlans.length)"></span>
                        </h3>
                    </div>
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meal Plans Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('name')">
                                <div class="flex items-center">
                                    Meal Plan
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="sortField === 'name' ? (sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7') : 'M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4'" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('price')">
                                <div class="flex items-center">
                                    Price
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="sortField === 'price' ? (sortDirection === 'asc' ? 'M5 15l7-7 7 7' : 'M19 9l-7 7-7-7') : 'M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4'" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('type')">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('subscribers')">
                                Subscribers
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('status')">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('created_at')">
                                Created
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <template x-for="plan in filteredMealPlans" :key="plan.id">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover" :src="plan.image" :alt="plan.name">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="plan.name"></div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400" x-text="plan.description.substring(0, 30) + '...'"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    Rp <span x-text="new Intl.NumberFormat('id-ID').format(plan.price)"></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400" x-text="plan.type">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white" x-text="plan.subscribers">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span x-show="plan.status === 'active'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Active
                                    </span>
                                    <span x-show="plan.status === 'draft'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        Draft
                                    </span>
                                    <span x-show="plan.status === 'archived'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        Archived
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400" x-text="new Date(plan.created_at).toLocaleDateString()">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <button @click="toggleStatus(plan)" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                        <a :href="'/admin/meal-plans/' + plan.id + '/edit'" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <button @click="confirmDelete(plan)" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        <tr x-show="filteredMealPlans.length === 0">
                            <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                No meal plans found matching your criteria.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t dark:border-gray-700 flex items-center justify-between">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Showing <span class="font-medium" x-text="filteredMealPlans.length"></span> of <span class="font-medium" x-text="mealPlans.length"></span> meal plans
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        Previous
                    </button>
                    <button class="px-3 py-1 rounded-md bg-green-600 text-white">
                        1
                    </button>
                    <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                        Next
                    </button>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Delete Meal Plan</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Are you sure you want to delete "<span x-text="mealPlanToDelete?.name" class="font-semibold"></span>"?
                    This action cannot be undone and will affect <span x-text="mealPlanToDelete?.subscribers"></span> active subscribers.
                </p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="showDeleteModal = false" type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button @click="deleteMealPlan" type="button" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete Plan
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin>