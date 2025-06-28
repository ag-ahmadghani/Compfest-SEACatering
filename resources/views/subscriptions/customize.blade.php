<!-- resources/views/subscriptions/customize.blade.php -->
<x-layout title="Customize Your Meal Plan">
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Customize Your Meal Plan</h1>
            <p class="text-center text-gray-600 mb-8">Complete the form below to create your personalized meal subscription</p>
            
            <form action="{{ route('subscriptions.store') }}" method="POST" class="bg-white rounded-xl shadow-md p-8">
                @csrf
                <input type="hidden" name="meal_plan_id" value="{{ $Plan->id }}">
                
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Plan Summary -->
                    <div class="space-y-4 w-full">
                        <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Your Plan</h2>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-bold text-lg">{{ $Plan->plan_name }}</h3>
                            <p class="text-gray-600">Rp {{ number_format($Plan->price, 0, ',', '.') }} per meal</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $Plan->description }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estimated Monthly Price</label>
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <p class="text-lg font-bold" id="estimated-price">Rp 0</p>
                                <p class="text-sm text-gray-600 mt-1">Based on your selections below</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Meal Type Selection -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Meal Types *</h2>
                    <p class="text-gray-600 mb-4">Select which meals you want to include in your plan (choose at least one)</p>
                    
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <input type="checkbox" id="breakfast" name="meal_types[]" value="breakfast" class="hidden peer" checked>
                            <label for="breakfast" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-400 peer-checked:border-green-600 peer-checked:bg-green-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="font-medium">Breakfast</span>
                            </label>
                        </div>
                        
                        <div>
                            <input type="checkbox" id="lunch" name="meal_types[]" value="lunch" class="hidden peer">
                            <label for="lunch" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-400 peer-checked:border-green-600 peer-checked:bg-green-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium">Lunch</span>
                            </label>
                        </div>
                        
                        <div>
                            <input type="checkbox" id="dinner" name="meal_types[]" value="dinner" class="hidden peer">
                            <label for="dinner" class="flex flex-col items-center justify-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-400 peer-checked:border-green-600 peer-checked:bg-green-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                <span class="font-medium">Dinner</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Delivery Days Selection -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Delivery Days *</h2>
                    <p class="text-gray-600 mb-4">Select which days you want your meals delivered (choose at least one)</p>
                    
                    <div class="grid md:grid-cols-7 gap-2">
                        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                        <div>
                            <input type="checkbox" id="{{ $day }}" name="delivery_days[]" value="{{ $day }}" class="hidden peer" 
                                   @if(in_array($day, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) checked @endif>
                            <label for="{{ $day }}" class="flex flex-col items-center justify-center p-3 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-green-400 peer-checked:border-green-600 peer-checked:bg-green-50 transition">
                                <span class="font-medium capitalize">{{ substr($day, 0, 3) }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Allergies & Dietary Restrictions -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 border-b pb-2 mb-4">Dietary Restrictions</h2>
                    <div>
                        <label for="allergies" class="block text-sm font-medium text-gray-700 mb-1">Allergies or Special Requirements</label>
                        <textarea id="allergies" name="allergies" rows="3" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"
                                  placeholder="List any allergies or dietary restrictions (e.g., gluten-free, vegetarian, nut allergy)"></textarea>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit" class="w-full cursor-pointer bg-green-600 text-white py-3 rounded-lg font-medium hover:bg-green-700 transition">
                        Complete Subscription
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mealPrice = {{ $Plan->price }};
            const mealCheckboxes = document.querySelectorAll('input[name="meal_types[]"]');
            const dayCheckboxes = document.querySelectorAll('input[name="delivery_days[]"]');
            const estimatedPriceElement = document.getElementById('estimated-price');
            
            function calculatePrice() {
                // Count selected meal types
                const selectedMeals = Array.from(mealCheckboxes).filter(cb => cb.checked).length;
                
                // Count selected delivery days
                const selectedDays = Array.from(dayCheckboxes).filter(cb => cb.checked).length;
                
                // Calculate total price (price × meals × days × 4.3 weeks)
                const totalPrice = mealPrice * selectedMeals * selectedDays * 4.3;
                
                // Update the display
                estimatedPriceElement.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
            }
            
            // Add event listeners
            mealCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculatePrice);
            });
            
            dayCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculatePrice);
            });
            
            // Initial calculation
            calculatePrice();
        });
    </script>
</x-layout>