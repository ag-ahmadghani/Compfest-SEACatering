<!-- resources/views/auth/login.blade.php -->
<x-layout title="Login">
    <section class="py-16 bg-gray-50 min-h-screen flex items-center">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
                    <p class="text-gray-600 mt-2">Sign in to your SEA Catering account</p>
                </div>

                <form x-data="{
                    email: '',
                    password: '',
                    remember: false,
                    isLoading: false,
                    errors: {},
                    submitForm() {
                        this.isLoading = true;
                        this.errors = {};
                        // Simulate login - in real app this would be an AJAX call
                        setTimeout(() => {
                            this.isLoading = false;
                            // For demo, just redirect to home
                            window.location.href = '/';
                        }, 1500);
                    }
                }" @submit.prevent="submitForm">
                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 mb-2 font-medium">Email Address</label>
                        <input type="email" id="email" x-model="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="your@email.com">
                        <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-sm mt-1"></p>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                        <input type="password" id="password" x-model="password" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="••••••••">
                        <p x-show="errors.password" x-text="errors.password" class="text-red-500 text-sm mt-1"></p>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" x-model="remember"
                                   class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-gray-700">Remember me</label>
                        </div>
                        {{-- <a href="/forgot-password" class="text-green-600 hover:text-green-700 text-sm font-medium">Forgot password?</a> --}}
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" :disabled="isLoading"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition
                                   disabled:opacity-70 disabled:cursor-not-allowed">
                        <span x-show="!isLoading">Sign In</span>
                        <span x-show="isLoading" x-cloak>
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Signing in...
                        </span>
                    </button>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Don't have an account? 
                            <a href="/register" class="text-green-600 hover:text-green-700 font-medium">Register here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>