<x-layout>
    <x-slot:title>Home</x-slot:title>
    <!-- Hero Section -->
    <section class="bg-green-50 py-16">
        <div class="container mx-auto px-4   lg:px-10 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">SEA Catering</h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-green-600 mb-6">Healthy Meals, Anytime, Anywhere</h2>
                <p class="text-gray-600 mb-8 text-lg">
                    Customizable healthy meals delivered to your doorstep across Indonesia. 
                    Start your journey to better eating with our nutritious and delicious meal plans.
                </p>
                <div class="flex space-x-4">
                    @guest
                    <a href="/subscription" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">Get Started</a>
                    @endguest
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
            
            <!-- Testimonial Carousel -->
            <div x-data="{
                currentIndex: 0,
                testimonials: [
                    {
                        name: 'Andi Wijaya',
                        location: 'Jakarta',
                        rating: 5,
                        comment: 'I\'ve been using SEA Catering for 3 months now and lost 5kg without feeling hungry! The meals are perfectly portioned and full of flavor. My favorites are the Balinese grilled fish and the tofu Buddha bowl.',
                        avatar: 'A',
                        date: '2 weeks ago',
                        meals: 'Weight Loss Plan',
                        duration: '3 months'
                    },
                    {
                        name: 'Sarah Putri',
                        location: 'Bandung',
                        rating: 4,
                        comment: 'As a doctor with crazy shifts, SEA Catering is a lifesaver. The meals arrive on time every morning and the packaging keeps them fresh. I just wish there were more vegan dessert options!',
                        avatar: 'S',
                        date: '1 month ago',
                        meals: 'Vegan Plan',
                        duration: '5 months'
                    },
                    {
                        name: 'Budi Santoso',
                        location: 'Surabaya',
                        rating: 5,
                        comment: 'After my diabetes diagnosis, I needed to change my diet. SEA Catering made it easy with their diabetic-friendly meals that actually taste good. My blood sugar levels have never been better!',
                        avatar: 'B',
                        date: '3 days ago',
                        meals: 'Diabetic Plan',
                        duration: '2 months'
                    },
                    {
                        name: 'Dewi Anggraeni',
                        location: 'Bali',
                        rating: 5,
                        comment: 'The postpartum meal plan was exactly what I needed after having my baby. Nutritious, easy to heat up, and helped me recover faster. The lactation-boosting soups were especially helpful!',
                        avatar: 'D',
                        date: '1 week ago',
                        meals: 'Postpartum Plan',
                        duration: '6 weeks'
                    },
                ],
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
                }
            }" class="relative max-w-4xl mx-auto">
                <!-- Testimonial Cards -->
                <div class="overflow-hidden relative h-80">
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <div 
                            x-show="currentIndex === index"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="absolute inset-0 bg-white p-8 rounded-lg shadow-md"
                        >
                            <div class="flex items-start mb-4">
                                <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold mr-4" x-text="testimonial.avatar"></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-semibold" x-text="testimonial.name"></h4>
                                            <p class="text-gray-500 text-sm" x-text="testimonial.location"></p>
                                        </div>
                                        <span class="text-gray-400 text-sm" x-text="testimonial.date"></span>
                                    </div>
                                    <div class="flex mt-1 mb-2">
                                        <template x-for="i in 5">
                                            <svg :class="{'text-yellow-400': i <= testimonial.rating, 'text-gray-300': i > testimonial.rating}" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </template>
                                    </div>
                                    <div class="text-sm text-gray-500 mb-2">
                                        <span x-text="testimonial.meals"></span> • 
                                        <span x-text="testimonial.duration + ' customer'"></span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600" x-text="'\"' + testimonial.comment + '\"'"></p>
                        </div>
                    </template>
                </div>
                
                <!-- Navigation Arrows -->
                <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 -ml-4 bg-white p-2 rounded-full shadow-md hover:bg-green-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 -mr-4 bg-white p-2 rounded-full shadow-md hover:bg-green-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicator Dots -->
                <div class="flex justify-center mt-6 space-x-2">
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <button @click="currentIndex = index" class="w-3 h-3 rounded-full transition" 
                                :class="{'bg-green-600': currentIndex === index, 'bg-gray-300': currentIndex !== index}">
                        </button>
                    </template>
                </div>
            </div>

            <!-- Testimonial Form -->
            <!-- Updated Testimonial Form -->
            <div class="mt-16 max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4 text-center">Share Your Experience</h3>
                <form @submit.prevent="addTestimonial">
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Your Name</label>
                            <input type="text" x-model="newTestimonial.name" required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Your Location</label>
                            <input type="text" x-model="newTestimonial.location" required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 mb-2">Meal Plan</label>
                            <select x-model="newTestimonial.meals" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Select Plan</option>
                                <option value="Weight Loss Plan">Weight Loss Plan</option>
                                <option value="Vegan Plan">Vegan Plan</option>
                                <option value="Diabetic Plan">Diabetic Plan</option>
                                <option value="Athlete Plan">Athlete Plan</option>
                                <option value="Postpartum Plan">Postpartum Plan</option>
                                <option value="Custom Plan">Custom Plan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">Duration</label>
                            <select x-model="newTestimonial.duration" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">How long?</option>
                                <option value="1 week">1 week</option>
                                <option value="2 weeks">2 weeks</option>
                                <option value="1 month">1 month</option>
                                <option value="3 months">3 months</option>
                                <option value="6 months+">6 months+</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Your Rating</label>
                        <div class="flex">
                            <template x-for="i in 5">
                                <svg 
                                    @click="newTestimonial.rating = i" 
                                    @mouseover="hoverRating = i" 
                                    @mouseleave="hoverRating = 0"
                                    :class="{
                                        'text-yellow-400': i <= (hoverRating || newTestimonial.rating),
                                        'text-gray-300': i > (hoverRating || newTestimonial.rating)
                                    }" 
                                    class="w-8 h-8 cursor-pointer" 
                                    fill="currentColor" 
                                    viewBox="0 0 20 20"
                                >
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </template>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Your Review</label>
                        <textarea x-model="newTestimonial.comment" required rows="4" 
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="What did you like about SEA Catering? How has it helped you? Any favorite meals?"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        Submit Review
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script>
        function testimonialSection() {
            return {
                currentIndex: 0,
                hoverRating: 0,
                testimonials: [
                    {
                        name: 'Andi Wijaya',
                        location: 'Jakarta',
                        rating: 5,
                        comment: 'I\'ve been using SEA Catering for 3 months now and lost 5kg without feeling hungry! The meals are perfectly portioned and full of flavor. My favorites are the Balinese grilled fish and the tofu Buddha bowl.',
                        avatar: 'A',
                        date: '2 weeks ago',
                        meals: 'Weight Loss Plan',
                        duration: '3 months'
                    },
                    // ... (other existing testimonials) ...
                ],
                newTestimonial: {
                    name: '',
                    location: '',
                    rating: 0,
                    comment: '',
                    meals: '',
                    duration: ''
                },
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.testimonials.length;
                },
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
                },
                addTestimonial() {
                    // Create new testimonial object
                    const newReview = {
                        ...this.newTestimonial,
                        avatar: this.newTestimonial.name.charAt(0),
                        date: 'Just now'
                    };
                    
                    // Add to beginning of testimonials array
                    this.testimonials.unshift(newReview);
                    
                    // Reset form
                    this.newTestimonial = {
                        name: '',
                        location: '',
                        rating: 0,
                        comment: '',
                        meals: '',
                        duration: ''
                    };
                    
                    // Show the new testimonial
                    this.currentIndex = 0;
                    
                    // Show success message
                    alert('Thank you for your review!');
                }
            }
        }
        </script>

    <!-- CTA Section -->
    <section class="py-16 bg-green-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Start Eating Healthy?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of satisfied customers across Indonesia who are enjoying nutritious, delicious meals delivered to their door.</p>
            <a href="/subscription" class="bg-white text-green-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium text-lg transition inline-block">Get Your Meal Plan</a>
        </div>
    </section>
</x-layout>