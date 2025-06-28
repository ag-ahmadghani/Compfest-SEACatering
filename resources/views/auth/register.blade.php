<x-layout title="Register">
    <section class="py-16 bg-gray-50 min-h-screen flex items-center">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden p-8">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Create Account</h1>
                    <p class="text-gray-600 mt-2">Join SEA Catering to start ordering healthy meals</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4">
                        @foreach ($errors->all() as $error)
                            <p class="text-red-600">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Name -->
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 mb-2 font-medium">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="John Doe">
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 mb-2 font-medium">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="your@email.com">
                    </div>

                    <!-- Phone -->
                    <div class="mb-6">
                        <label for="phone_number" class="block text-gray-700 mb-2 font-medium">Phone Number</label>
                        <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="+62 812 3456 7890">
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="••••••••">
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 mb-2 font-medium">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                               placeholder="••••••••">
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            </div>
                            <label for="terms" class="ml-2 block text-gray-700 text-sm">
                                I agree to the <a href="/terms" class="text-green-600 hover:text-green-700">Terms of Service</a> and <a href="/privacy" class="text-green-600 hover:text-green-700">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Already have an account? 
                            <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-medium">Sign in here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>