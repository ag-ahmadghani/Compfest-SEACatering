<x-layout title="Subscription Plans">
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Choose Your Plan</h1>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">Select the subscription that works best for you. Cancel or change plans anytime.</p>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Basic Plan -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-2 border-green-200 hover:border-green-400 transition">
                    <div class="bg-green-600 text-white py-4 text-center">
                        <h3 class="text-xl font-bold">Basic</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-center mb-6">
                            <span class="text-4xl font-bold text-gray-800">Rp 900.000</span>
                            <span class="text-gray-600">/month</span>
                        </p>
                        
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>5 meals per week</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Standard meal options</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Basic nutritional info</span>
                            </li>
                        </ul>
                        
                        <button class="w-full bg-green-100 text-green-600 py-3 rounded-lg font-medium hover:bg-green-200 transition">
                            Get Started
                        </button>
                    </div>
                </div>
                
                <!-- Popular Plan -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border-2 border-green-400 transform scale-105 z-10">
                    <div class="bg-green-700 text-white py-4 text-center relative">
                        <div class="absolute top-0 right-4 bg-yellow-400 text-yellow-800 text-xs font-bold px-2 py-1 rounded-b-lg">POPULAR</div>
                        <h3 class="text-xl font-bold">Premium</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-center mb-6">
                            <span class="text-4xl font-bold text-gray-800">Rp 1,500.000</span>
                            <span class="text-gray-600">/month</span>
                        </p>
                        
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>14 meals per week</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Premium meal options</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Detailed nutritional info</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Customizable preferences</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Free nutrition consultation</span>
                            </li>
                        </ul>
                        
                        <button class="w-full bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition">
                            Get Started
                        </button>
                    </div>
                </div>
                
                <!-- Family Plan -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-2 border-green-200 hover:border-green-400 transition">
                    <div class="bg-green-600 text-white py-4 text-center">
                        <h3 class="text-xl font-bold">Family</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-center mb-6">
                            <span class="text-4xl font-bold text-gray-800">Rp 2,800.000</span>
                            <span class="text-gray-600">/month</span>
                        </p>
                        
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>21 meals per week</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Family-sized portions</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Kid-friendly options</span>
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Variety pack included</span>
                            </li>
                        </ul>
                        
                        <button class="w-full bg-green-100 text-green-600 py-3 rounded-lg font-medium hover:bg-green-200 transition">
                            Get Started
                        </button>
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
                            <span class="font-medium">How does the subscription work?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" :class="{ 'transform rotate-180': openFaq === 1 }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="openFaq === 1" x-collapse class="p-4 bg-white">
                            <p class="text-gray-600">Our subscription service delivers fresh, healthy meals to your doorstep on a weekly basis. You can choose your preferred delivery day and customize your meals through our platform.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ Item 2 -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <button 
                            @click="openFaq === 2 ? openFaq = null : openFaq = 2"
                            class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition"
                        >
                            <span class="font-medium">Can I change or cancel my subscription?</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform" :class="{ 'transform rotate-180': openFaq === 2 }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="openFaq === 2" x-collapse class="p-4 bg-white">
                            <p class="text-gray-600">Yes! You can change your meal preferences, delivery schedule, or cancel your subscription at any time through your account settings.</p>
                        </div>
                    </div>
                    
                    <!-- Add more FAQ items as needed -->
                </div>
            </div>
        </div>
    </section>
</x-layout>