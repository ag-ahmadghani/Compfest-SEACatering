<x-admin title="Subscriptions Management">
    <div class="space-y-6" x-data="{
        subscriptions: [
            {
                id: 1,
                user: { name: 'Andi Wijaya', email: 'andi@example.com', avatar: 'A' },
                meal_plan: { name: 'Balanced Lifestyle', price: 250000 },
                start_date: '2023-06-15',
                end_date: '2023-07-15',
                status: 'active',
                payment_status: 'paid',
                delivery_days: ['Mon', 'Wed', 'Fri']
            },
            {
                id: 2,
                user: { name: 'Sarah Putri', email: 'sarah@example.com', avatar: 'S' },
                meal_plan: { name: 'Weight Loss', price: 300000 },
                start_date: '2023-06-01',
                end_date: '2023-07-01',
                status: 'paused',
                payment_status: 'paid',
                delivery_days: ['Tue', 'Thu']
            }
        ],
        searchQuery: '',
        sortField: 'id',
        sortDirection: 'desc',
        showCancelModal: false,
        subscriptionToCancel: null,
        
        get filteredSubscriptions() {
            return this.subscriptions.filter(sub => {
                return sub.user.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                       sub.meal_plan.name.toLowerCase().includes(this.searchQuery.toLowerCase());
            }).sort((a, b) => {
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
        
        confirmCancel(sub) {
            this.subscriptionToCancel = sub;
            this.showCancelModal = true;
        },
        
        cancelSubscription() {
            this.subscriptions = this.subscriptions.map(sub => {
                if (sub.id === this.subscriptionToCancel.id) {
                    return { ...sub, status: 'cancelled' };
                }
                return sub;
            });
            this.showCancelModal = false;
        },
        
        formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric' 
            });
        }
    }">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold dark:text-white">Subscriptions Management</h2>
            <a href="/admin/subscriptions/create" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Add New Subscription
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800">
            <div class="px-6 py-4 border-b dark:border-gray-700">
                <input type="text" x-model="searchQuery" placeholder="Search subscriptions..." 
                       class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('user.name')">
                                Customer
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('meal_plan.name')">
                                Meal Plan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Delivery Days
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('start_date')">
                                Period
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('status')">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        <template x-for="sub in filteredSubscriptions" :key="sub.id">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-bold">
                                            <span x-text="sub.user.avatar"></span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="sub.user.name"></div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400" x-text="sub.user.email"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="sub.meal_plan.name"></div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Rp <span x-text="new Intl.NumberFormat('id-ID').format(sub.meal_plan.price)"></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-1">
                                        <template x-for="day in sub.delivery_days">
                                            <span class="px-2 py-1 text-xs rounded bg-gray-100 dark:bg-gray-700" x-text="day"></span>
                                        </template>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    <div x-text="formatDate(sub.start_date) + ' - ' + formatDate(sub.end_date)"></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span x-show="sub.status === 'active'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Active
                                    </span>
                                    <span x-show="sub.status === 'paused'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                        Paused
                                    </span>
                                    <span x-show="sub.status === 'cancelled'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        Cancelled
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a :href="'/admin/subscriptions/' + sub.id + '/edit'" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            Edit
                                        </a>
                                        <button x-show="sub.status !== 'cancelled'" @click="confirmCancel(sub)" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            Cancel
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Cancel Modal -->
        <div x-show="showCancelModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Cancel Subscription</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Are you sure you want to cancel <span x-text="subscriptionToCancel?.user.name + '\'s subscription'"></span>?
                </p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="showCancelModal = false" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                        No, Keep Active
                    </button>
                    <button @click="cancelSubscription" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Yes, Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin>