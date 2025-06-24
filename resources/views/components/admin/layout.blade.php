<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: window.innerWidth >= 1024, darkMode: false, loading: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | {{ $title ?? 'SEA Catering' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .active-nav {
            @apply bg-green-100 text-green-600 dark:bg-gray-700;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Loading Overlay -->
    <div x-show="loading" x-cloak 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-green-500"></div>
    </div>

    <!-- Sidebar Backdrop -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" 
         class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden" x-cloak></div>

    <!-- Admin Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            @include('admin.partials.header')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50 dark:bg-gray-900">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Scripts -->
    @include('admin.partials.scripts')
</body>
</html>