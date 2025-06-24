<header class="bg-white shadow-sm z-10 dark:bg-gray-800">
    <div class="flex items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
        <!-- Mobile menu button -->
        <button @click="sidebarOpen = true" class="lg:hidden text-gray-500 hover:text-gray-600 dark:text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div class="flex-1 flex justify-between items-center">
            <div class="flex items-center">
                <!-- Search bar can be added here -->
            </div>

            <div class="flex items-center space-x-4">
                <!-- Dark mode toggle -->
                <button @click="darkMode = !darkMode" class="p-2 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>

                <!-- User dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="hidden md:inline-block dark:text-white">{{ auth()->user()->name }}</span>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak
                         class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 dark:bg-gray-700">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>