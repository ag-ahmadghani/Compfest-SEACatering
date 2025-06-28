<x-layout title="Contact Us">
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Contact SEA Catering</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">We're here to help with any questions about our meal plans, delivery, or custom orders.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Send Us a Message</h2>
                    
                    <form x-data="{
                        formData: {
                            name: '',
                            email: '',
                            phone_number: '',
                            subject: 'General Inquiry',
                            message: ''
                        },
                        isLoading: false,
                        isSuccess: false,
                        submitForm() {
                            this.isLoading = true;
                            // Simulate form submission
                            setTimeout(() => {
                                this.isSuccess = true;
                                this.isLoading = false;
                                this.formData = { 
                                    name: '', 
                                    email: '', 
                                    phone_number: '', 
                                    subject: 'General Inquiry', 
                                    message: '' 
                                };
                            }, 1500);
                        }
                    }" @submit.prevent="submitForm">
                        <!-- Success Message -->
                        <div x-show="isSuccess" x-cloak 
                             class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                            Thank you for your message! We'll get back to you within 24 hours.
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2 font-medium">Full Name</label>
                                <input type="text" id="name" x-model="formData.name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-gray-700 mb-2 font-medium">Email Address</label>
                                <input type="email" id="email" x-model="formData.email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="phone_number" class="block text-gray-700 mb-2 font-medium">Phone Number</label>
                            <input type="tel" id="phone_number" x-model="formData.phone"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                                   placeholder="+62">
                        </div>

                        <div class="mb-6">
                            <label for="subject" class="block text-gray-700 mb-2 font-medium">Subject</label>
                            <select id="subject" x-model="formData.subject" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Meal Plans">Meal Plans</option>
                                <option value="Delivery Questions">Delivery Questions</option>
                                <option value="Custom Orders">Custom Orders</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 mb-2 font-medium">Your Message</label>
                            <textarea id="message" x-model="formData.message" rows="5" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"></textarea>
                        </div>

                        <button type="submit" :disabled="isLoading"
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition
                                       disabled:opacity-70 disabled:cursor-not-allowed">
                            <span x-show="!isLoading">Send Message</span>
                            <span x-show="isLoading" x-cloak>
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <div class="bg-white p-8 rounded-xl shadow-lg mb-8">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Contact Information</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-green-100 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800 mb-1">Phone</h3>
                                    <p class="text-gray-600">+62 812 3456 7890 (Brian, Manager)</p>
                                    <p class="text-gray-600">+62 821 0987 6543 (Customer Service)</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-100 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800 mb-1">Email</h3>
                                    <p class="text-gray-600">hello@seacatering.id</p>
                                    <p class="text-gray-600">orders@seacatering.id</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-100 p-3 rounded-full mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800 mb-1">Head Office</h3>
                                    <p class="text-gray-600">Jl. Sudirman No. 123</p>
                                    <p class="text-gray-600">Jakarta Selatan 12190</p>
                                    <p class="text-gray-600">Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="bg-white p-8 rounded-xl shadow-lg">
                        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Business Hours</h2>
                        
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Monday - Friday</span>
                                <span class="text-gray-600 font-medium">8:00 AM - 8:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Saturday</span>
                                <span class="text-gray-600 font-medium">9:00 AM - 5:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Sunday</span>
                                <span class="text-gray-600 font-medium">Closed</span>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h3 class="font-medium text-gray-800 mb-3">Delivery Hours</h3>
                            <p class="text-gray-600">Daily from 10:00 AM to 7:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div class="bg-gray-100 h-96">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJl.%20Jend.%20Sudirman%20No.123%2C%20RT.1%2FRW.3%2C%20Karet%20Semanggi%2C%20Kecamatan%20Setiabudi%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012920!5e0!3m2!1sen!2sid!4v1621234567890!5m2!1sen!2sid" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy"
            class="filter grayscale(20%) contrast(110%)">
        </iframe>
    </div>
</x-layout>