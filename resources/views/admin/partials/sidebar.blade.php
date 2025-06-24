<aside x-show="sidebarOpen" x-transition
       class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-lg transform lg:translate-x-0 transition duration-200 ease-in-out dark:bg-gray-800"
       :class="{ '-translate-x-full': !sidebarOpen }">
    <div class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <span class="text-xl font-bold dark:text-white">SEA Admin</span>
        </div>
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-500 hover:text-gray-600 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition {{ request()->routeIs('admin.dashboard') ? 'active-nav' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.meal-plans.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition {{ request()->routeIs('admin.meal-plans.*') ? 'active-nav' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Meal Plans
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subscriptions.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition {{ request()->routeIs('admin.subscriptions.*') ? 'active-nav' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Subscriptions
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition {{ request()->routeIs('admin.users.*') ? 'active-nav' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Users
                </a>
            </li>
        </ul>
    </nav>
</aside>