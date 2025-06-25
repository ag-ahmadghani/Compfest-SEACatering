<x-admin title="Users Management">
    <div class="space-y-6" x-data="{
        users: [
            {
                id: 1,
                name: 'Andi Wijaya',
                email: 'andi@example.com',
                phone: '08123456789',
                role: 'customer',
                status: 'active',
                last_login: '2023-06-20T14:30:00Z',
                subscription_count: 1
            },
            {
                id: 2,
                name: 'Sarah Putri',
                email: 'sarah@example.com',
                phone: '08234567890',
                role: 'customer',
                status: 'active',
                last_login: '2023-06-18T10:15:00Z',
                subscription_count: 2
            },
            {
                id: 3,
                name: 'Admin User',
                email: 'admin@seacatering.id',
                phone: '08345678901',
                role: 'admin',
                status: 'active',
                last_login: '2023-06-21T08:45:00Z',
                subscription_count: 0
            }
        ],
        searchQuery: '',
        sortField: 'id',
        sortDirection: 'desc',
        showDeactivateModal: false,
        userToDeactivate: null,
        
        get filteredUsers() {
            return this.users.filter(user => {
                return user.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                       user.email.toLowerCase().includes(this.searchQuery.toLowerCase());
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
        
        confirmDeactivate(user) {
            this.userToDeactivate = user;
            this.showDeactivateModal = true;
        },
        
        toggleUserStatus() {
            this.users = this.users.map(user => {
                if (user.id === this.userToDeactivate.id) {
                    return { ...user, status: user.status === 'active' ? 'inactive' : 'active' };
                }
                return user;
            });
            this.showDeactivateModal = false;
        },
        
        formatDate(dateString) {
            if (!dateString) return 'Never';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    }">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold dark:text-white">Users Management</h2>
            <div class="flex space-x-3">
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:hover:bg-gray-700">
                    Export
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800">
            <div class="px-6 py-4 border-b dark:border-gray-700">
                <input type="text" x-model="searchQuery" placeholder="Search users..." 
                       class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600">
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('name')">
                                User
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Contact
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('role')">
                                Role
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300 cursor-pointer" @click="sort('last_login')">
                                Last Login
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                Subscriptions
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
                        <template x-for="user in filteredUsers" :key="user.id">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 font-bold">
                                            <span x-text="user.name.charAt(0)"></span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="user.name"></div>
                                            <div class="text-sm text-gray-500 dark:text-gray-400" x-text="user.email"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400" x-text="user.phone">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span x-show="user.role === 'admin'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        Admin
                                    </span>
                                    <span x-show="user.role === 'customer'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        Customer
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400" x-text="formatDate(user.last_login)">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white" x-text="user.subscription_count">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span x-show="user.status === 'active'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        Active
                                    </span>
                                    <span x-show="user.status === 'inactive'" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        Inactive
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a :href="'/admin/users/' + user.id + '/edit'" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            Edit
                                        </a>
                                        <button @click="confirmDeactivate(user)" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                            <span x-text="user.status === 'active' ? 'Deactivate' : 'Activate'"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Deactivate Modal -->
        <div x-show="showDeactivateModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4" x-text="userToDeactivate?.status === 'active' ? 'Deactivate User' : 'Activate User'"></h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Are you sure you want to <span x-text="userToDeactivate?.status === 'active' ? 'deactivate' : 'activate'"></span> 
                    <span x-text="userToDeactivate?.name"></span>?
                </p>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="showDeactivateModal = false" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button @click="toggleUserStatus" class="px-4 py-2" 
                            :class="userToDeactivate?.status === 'active' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-green-600 hover:bg-green-700 text-white'">
                        <span x-text="userToDeactivate?.status === 'active' ? 'Deactivate' : 'Activate'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin>