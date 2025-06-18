<nav class="bg-green-600 text-white shadow-lg" x-data="{ open: false }">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <span class="text-xl font-bold">SEA Catering</span>
        </div>
        
        <div class="hidden md:flex space-x-6">
            <a href="/" class="hover:text-green-200 transition">Home</a>
            <a href="/menu" class="hover:text-green-200 transition">Menu</a>
            <a href="/subscription" class="hover:text-green-200 transition">Subscription</a>
            <a href="/contact" class="hover:text-green-200 transition">Contact Us</a>
        </div>
        
        <div class="md:hidden">
            <button @click="open = ! open" class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div x-show="open" x-transition @click.away="open = false" class="md:hidden bg-green-700 px-4 py-2" x-cloak>
        <a href="/" class="block py-2 hover:text-green-200 transition">Home</a>
        <a href="/menu" class="block py-2 hover:text-green-200 transition">Menu</a>
        <a href="/subscription" class="block py-2 hover:text-green-200 transition">Subscription</a>
        <a href="/contact" class="block py-2 hover:text-green-200 transition">Contact Us</a>
    </div>
</nav>