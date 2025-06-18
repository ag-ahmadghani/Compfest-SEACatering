<x-layout>
    <x-slot:title>Home</x-slot:title>
    <!-- Hero Section -->
    <section class="bg-green-50 py-16">
        <div class="container mx-auto px-4 lg:px-10 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">SEA Catering</h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Healthy Meals, Anytime, Anywhere</h2>
                <p class="text-gray-600 mb-8 text-lg">
                    Customizable healthy meals delivered to your doorstep across Indonesia. 
                    Start your journey to better eating with our nutritious and delicious meal plans.
                </p>
                <div class="flex space-x-4">
                    <a href="/subscription" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">Get Started</a>
                    <a href="/menu" class="border border-green-600 text-green-600 hover:bg-green-50 px-6 py-3 rounded-lg font-medium transition">View Menu</a>
                </div>
            </div>
            <div class="md:w-1/3">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                     alt="Healthy Food" 
                     class="rounded-lg shadow-xl w-full h-auto">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Why Choose SEA Catering?</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-green-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Nutritious Meals</h3>
                    <p class="text-gray-600">Carefully crafted by nutritionists to provide balanced meals that fuel your body and mind.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-green-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Nationwide Delivery</h3>
                    <p class="text-gray-600">We deliver to cities across Indonesia, bringing healthy meals to your doorstep.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="text-green-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Fully Customizable</h3>
                    <p class="text-gray-600">Tailor your meals to your dietary preferences and nutritional needs with our easy-to-use platform.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-green-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">What Our Customers Say</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-4">A</div>
                        <div>
                            <h4 class="font-semibold">Andi Wijaya</h4>
                            <p class="text-gray-500 text-sm">Jakarta</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"SEA Catering has transformed my eating habits. The meals are delicious and I've never felt better!"</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-4">S</div>
                        <div>
                            <h4 class="font-semibold">Sarah Putri</h4>
                            <p class="text-gray-500 text-sm">Bandung</p>
                        </div>
                    </div>
                    <p class="text-gray-600">"As a busy professional, SEA Catering saves me so much time while ensuring I eat healthy meals every day."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-green-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Start Eating Healthy?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of satisfied customers across Indonesia who are enjoying nutritious, delicious meals delivered to their door.</p>
            <a href="/subscription" class="bg-white text-green-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium text-lg transition inline-block">Get Your Meal Plan</a>
        </div>
    </section>
</x-layout>