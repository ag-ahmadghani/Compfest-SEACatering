<x-layout title="Our Menu">
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Our Meal Plans</h1>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">Choose from our variety of healthy meal plans designed by nutritionists to fit your lifestyle and dietary needs.</p>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($mealPlans as $plan)
                <!-- Meal Plan 1 -->
                <div x-data="{ open: false }" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Balanced Plan" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $plan->plan_name }}</h3>
                        <p class="text-green-600 font-bold mb-4">Rp {{number_format($plan->price, 0, ',', '.') }} / meal</p>
                        <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                        <button @click="open = true" class="w-full bg-green-100 text-green-600 py-2 rounded-lg hover:bg-green-200 transition">
                            See Details
                        </button>
                    </div>
                    
                    <!-- Modal -->
                    <div x-show="open" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                        <div @click.away="open = false" class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-2xl font-bold">{{ $plan->plan_name }}</h3>
                                    <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                
                                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Balanced Plan" class="w-full h-64 object-cover rounded-lg mb-6">
                                
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <h4 class="font-semibold mb-2">Price</h4>
                                        <p class="text-green-600 font-bold">Rp {{number_format($plan->price, 0, ',', '.') }} / meal</p>
                                        
                                        <h4 class="font-semibold mt-4 mb-2">Description</h4>
                                        <p class="text-gray-600">{{ $plan->description }}</p>
                                    </div>
                                    
                                </div>
                                <a href="{{ route('subscription.customize', $plan->id) }}">
        
                                    <button class="mt-6 w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
                                        Subscribe Now
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>