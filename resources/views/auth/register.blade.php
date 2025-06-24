<!-- resources/views/auth/register.blade.php -->
<x-layout title="Register">
    <section class="py-16 bg-gray-50 min-h-screen flex items-center">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Create Account</h1>
                    <p class="text-gray-600 mt-2">Join SEA Catering to start ordering healthy meals</p>
                </div>

                <form x-data="{
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                    isLoading: false,
                    errors: {},
                    submitForm() {
                        this.isLoading = true;
                        this.errors = {};
                        // Simulate registration - in real app this would be an AJAX call
                        setTimeout(() => {
                            this.isLoading = false;
                            // For demo, just redirect to home
                            window.location.href = '/';
                        }, 1500);
                    }
                }" @submit.prevent="submitForm">
                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 mb-2 font-medium">Full Name</label>
                        <input type="text" id="name" x-model="name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="John Doe">
                        <p x-show="errors.name" x-text="errors.name" class="text-red-500 text-sm mt-1"></p>
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 mb-2 font-medium">Email Address</label>
                        <input type="email" id="email" x-model="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="your@email.com">
                        <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-sm mt-1"></p>
                    </div>

                    <!-- Phone -->
                    <div class="mb-6">
                        <label for="phone" class="block text-gray-700 mb-2 font-medium">Phone Number</label>
                        <input type="tel" id="phone" x-model="phone" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="+62 812 3456 7890">
                        <p x-show="errors.phone" x-text="errors.phone" class="text-red-500 text-sm mt-1"></p>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                        <input type="password" id="password" x-model="password" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="••••••••">
                        <p x-show="errors.password" x-text="errors.password" class="text-red-500 text-sm mt-1"></p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 mb-2 font-medium">Confirm Password</label>
                        <input type="password" id="password_confirmation" x-model="password_confirmation" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="••••••••">
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" required
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            </div>
                            <label for="terms" class="ml-2 block text-gray-700 text-sm">
                                I agree to the <a href="/terms" class="text-green-600 hover:text-green-700">Terms of Service</a> and <a href="/privacy" class="text-green-600 hover:text-green-700">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" :disabled="isLoading"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition
                                   disabled:opacity-70 disabled:cursor-not-allowed">
                        <span x-show="!isLoading">Create Account</span>
                        <span x-show="isLoading" x-cloak>
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Creating account...
                        </span>
                    </button>

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Already have an account? 
                            <a href="/login" class="text-green-600 hover:text-green-700 font-medium">Sign in here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>