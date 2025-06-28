<x-layout title="Subscription Plans">
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Customize Your Meal Plan</h1>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">Select your preferred meals and delivery schedule. Prices are calculated per meal.</p>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach ($mealPlans as $plan)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-green-400 transform scale-105 z-10">
                    <div class="bg-green-700 text-white py-4 text-center relative">
                        <div class="absolute top-0 right-4 bg-yellow-400 text-yellow-800 text-xs font-bold px-2 py-1 rounded-b-lg">POPULAR</div>
                        <h3 class="text-xl font-bold">{{ $plan->plan_name }}</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-center mb-6">
                            <span class="text-4xl font-bold text-gray-800">Rp {{number_format($plan->price, 0, ',', '.') }}</span>
                            <span class="text-gray-600">/meal</span>
                        </p>
                        
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $plan->description }}</span>
                            </li>
                        </ul>
                        
                        <a href="{{ route('subscription.customize', $plan->id) }}" class="w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition flex justify-center">
                            Subscribe Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- How It Works Section -->
            <div class="mt-16 max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-center mb-8">How It Works</h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-green-600">1</span>
                        </div>
                        <h3 class="font-bold mb-2">Choose Your Plan</h3>
                        <p class="text-gray-600">Select from our three meal plans based on your dietary needs and preferences.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-green-600">2</span>
                        </div>
                        <h3 class="font-bold mb-2">Customize Your Meals</h3>
                        <p class="text-gray-600">Select which meals (breakfast, lunch, dinner) and which days you want delivery.</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-green-600">3</span>
                        </div>
                        <h3 class="font-bold mb-2">Enjoy Fresh Meals</h3>
                        <p class="text-gray-600">Receive delicious, freshly prepared meals at your doorstep according to your schedule.</p>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Section -->
            <div class="mt-16 max-w-3xl mx-auto">
                <h2 class="text-2xl font-bold text-center mb-8">Frequently Asked Questions</h2>
                
                <div x-data="{ openFaq: null }" class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button 
                            @click="openFaq === 1 ? openFaq = null : openFaq = 1"
                            class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition"
                        >
                            <span class="font-medium">How is the price calculated?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" :class="{ 'transform rotate-180': openFaq === 1 }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="p-4 bg-white">
                            <p class="text-gray-600">The total price is calculated as: (Plan Price per Meal) × (Number of Meal Types Selected) × (Number of Delivery Days Selected) × 4.3 (weeks in a month). For example, selecting the Protein Plan (Rp40,000) for Breakfast and Dinner (2 meals) delivered Monday to Friday (5 days) would be: 40,000 × 2 × 5 × 4.3 = Rp1,720,000 per month.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button 
                            @click="openFaq === 2 ? openFaq = null : openFaq = 2"
                            class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition"
                        >
                            <span class="font-medium">Can I change my meal selections after subscribing?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" :class="{ 'transform rotate-180': openFaq === 2 }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="p-4 bg-white">
                            <p class="text-gray-600">Yes! You can change your meal preferences, delivery schedule, or cancel your subscription at any time through your account settings. Changes made before the weekly cutoff will apply to the next delivery cycle.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 3 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button 
                            @click="openFaq === 3 ? openFaq = null : openFaq = 3"
                            class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition"
                        >
                            <span class="font-medium">How do you handle dietary restrictions?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" :class="{ 'transform rotate-180': openFaq === 3 }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="openFaq === 3" x-collapse class="p-4 bg-white">
                            <p class="text-gray-600">When you subscribe, you can list any allergies or dietary restrictions in the provided field. Our chefs will ensure your meals meet your specific requirements. Common restrictions like gluten-free, dairy-free, vegetarian, etc. are easily accommodated.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>